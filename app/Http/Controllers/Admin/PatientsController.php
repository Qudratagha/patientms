<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
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

        // Check if any of the fields have data
        if ($date || $medicine || $dose) {
            // Assuming $patient is defined somewhere before
            $medications = [];

            // Create an array of medications with non-empty fields
            for ($i = 0; $i < count($date); $i++) {
                if (!empty($date[$i]) || !empty($medicine[$i]) || !empty($dose[$i])) {
                    $medications[] = [
                        'patientID' => $patient->id,
                        'date' => $date[$i],
                        'medicine' => $medicine[$i],
                        'dose' => $dose[$i],
                    ];
                }
            }
            // Insert medications using Eloquent's insert method for bulk insert
            if (!empty($medications)) {
                Medication::insert($medications);
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
        $patient = Patients::findorfail($id);
        dd($patient->load('medicalHistory', 'medications'));

        return view('admin.patients.show', compact('patients'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patients $patients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientsRequest $request, Patients $patients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patients $patients)
    {
        //
    }
}
