<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
use App\Models\Guardian;
use App\Models\MedicalHistory;
use App\Models\Medication;
use App\Models\Patients;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Gate;
class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('patients_read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->ajax()) {
            $query = Patients::query();
            if ($request->has('name') && $request->name != '') {
                $query->where('name', 'like', '%' . $request->name . '%');
            }
            $table = Datatables::of($query);
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $viewGate      = 'patients_read';
                $editGate      = 'patients_update';
                $deleteGate    = 'patients_delete';
                $crudRoutePart = 'patients';
                $primaryKey = 'id';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row',
                    'primaryKey'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id;
            });
            $table->editColumn('name', function ($row) {
                return $row->name;
            });
            $table->editColumn('date_of_birth', function ($row) {
                return $row->date_of_birth;
            });
            $table->addColumn('gender', function ($row) {
                return $row->gender == 0 ? 'Male' : 'Female';

            });
            $table->addColumn('country', function ($row) {
                return $row->country;
            });
            $table->addColumn('city', function ($row) {
                return $row->city;
            });
            $table->addColumn('address', function ($row) {
                return $row->address;
            });
            $table->addColumn('phone', function ($row) {
                return $row->phone;
            });
            $table->addColumn('email', function ($row) {
                return $row->email;
            });
            $table->rawColumns(['actions']);

            return $table->make(true);
        }
        return view('admin.patients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.patients.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientsRequest $request)
    {
        $patient = Patients::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'blood_group' => $request->blood_group,
            'marital_status' => $request->marital_status,
            'phone' => $request->phone,
            'email' => $request->email,
            'remarks' => $request->remarks,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address
        ]);
        $guardian = Guardian::create([
            'patientID' => $patient->id,
            'guardian_name' => $request->guardian_name,
            'relation' => $request->relation,
            'g_phone' => $request->g_phone,
            'g_email' => $request->g_email,
        ]);

        $medicalHistory = MedicalHistory::create([
            'patientID' => $patient->id,
            'disease' => $request->disease,
            'no_of_visits' => $request->no_of_visits,
            'doctor' => $request->doctor,
        ]);
        // Extract data from the request
        $date = $request->date;
        $medicine = $request->medicine;
        $dose = $request->dose;
        if (!empty($date) || !empty($medicine) || !empty($dose)) {
            foreach ($date as $key => $value) {
                Medication::create([
                    'patientID' => $patient->id,
                    'date' => $date[$key] ?? null,
                    'medicine' => $medicine[$key] ?? null,
                    'dose' => $dose[$key] ?? null,
                ]);
            }
        }

        $request->session()->flash('message', 'Patient Created successfully!');
        return view('admin.patients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patients $patients, $id)
    {
        $patient = Patients::with(['guardian', 'medicalHistory', 'medications'])->findOrFail($id);
        return view('admin.patients.show', compact('patient'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patients $patients, $id)
    {
        $patient = Patients::with(['guardian', 'medicalHistory', 'medications'])->findOrFail($id);
        return view('admin.patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientsRequest $request, $id)
    {
        $patient = Patients::findOrFail($id);
        $patient->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'blood_group' => $request->blood_group,
            'marital_status' => $request->marital_status,
            'phone' => $request->phone,
            'email' => $request->email,
            'remarks' => $request->remarks,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address
        ]);

        // Update the Guardian
        $guardian = Guardian::where('patientID', $id)->first();
        if ($guardian) {
            $guardian->update([
                'guardian_name' => $request->guardian_name,
                'relation' => $request->relation,
                'g_phone' => $request->g_phone,
                'g_email' => $request->g_email,
            ]);
        }

        // Update or Create Medical History
        $medicalHistory = MedicalHistory::where('patientID', $id)->first();
        if ($medicalHistory) {
            $medicalHistory->update([
                'disease' => $request->disease,
                'no_of_visits' => $request->no_of_visits,
                'doctor' => $request->doctor,
            ]);
        } else {
            // Create new MedicalHistory record
            $medicalHistory = MedicalHistory::create([
                'patientID' => $id,
                'disease' => $request->disease,
                'no_of_visits' => $request->no_of_visits,
                'doctor' => $request->doctor,
            ]);
        }

        // Update or Create Medications

        // Process new medication data
        $date = $request->date;
        $medicine = $request->medicine;
        $dose = $request->dose;

        if (!empty($date) && !empty($medicine) && !empty($dose)) {
            Medication::where('patientID', $id)->delete();
            foreach ($date as $key => $value) {
                $medicationData = [
                    'patientID' => $id,
                    'date' => $date[$key] ?? null,
                    'medicine' => $medicine[$key] ?? null,
                    'dose' => $dose[$key] ?? null,
                ];
                // Create new medication
                Medication::create($medicationData);
            }
        }
        $request->session()->flash('message', 'Patient Updated successfully!');
        return view('admin.patients.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $patient = Patients::findOrFail($id);

        // Delete associated records (guardians, medical histories, medications)
        $patient->guardian()->delete();
        $patient->medicalHistory()->delete();
        $patient->medications()->delete();

        // Delete the patient record itself
        $patient->delete();
        $request->session()->flash('message', 'Patient Deleted successfully!');
        return view('admin.patients.index');

    }
}
