@extends('layouts.main')
@section('title','Patients Create')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @include('partials.message')

            <div class="row">
                <form method="POST" action="{{route('patients.store')}}">
                    @csrf
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title d-inline-block">Patients Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="customer_street" class="form-label required">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name" value="{{old('name')}}" placeholder="Patient Name">
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-3">
                                        <label for="gender" class="form-label">Gender<span class="text-danger">*</span></label>
                                        <select name="gender" class="form-control @if($errors->has('gender')) is-invalid @endif">
                                            <option value="">Select</option>
                                            @php
                                                $genders = [
                                                    '0' => 'Male',
                                                    '1' => 'Female'
                                                ];
                                                $oldGender = old('gender');
                                            @endphp
                                            @foreach ($genders as $value => $label)
                                                <option value="{{ $value }}" {{ $oldGender == $value ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('gender'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('gender') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-3">
                                        <label for="date_of_birth" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control @if($errors->has('date_of_birth')) is-invalid @endif" name="date_of_birth" id="date_of_birth" value="{{old('date_of_birth')}}" >
                                        @if($errors->has('date_of_birth'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('date_of_birth') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-3">
                                        <label for="blood_group" class="form-label">Blood Group <span class="text-danger">*</span></label>
                                        <select name="blood_group" class="form-control @if($errors->has('blood_group')) is-invalid @endif" autocomplete="off">
                                            <option value="">Select</option>
                                            @php
                                                $bloodGroups = ['B+', 'A+', 'AB-', 'AB+', 'O-', 'A-', 'B-', 'O+'];
                                                $oldBloodGroup = old('blood_group');
                                            @endphp
                                            @foreach ($bloodGroups as $group)
                                                <option value="{{ $group }}" {{ $oldBloodGroup == $group ? 'selected' : '' }}>{{ $group }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('blood_group'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('blood_group') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3">
                                        <label for="customer_street" class="form-label required">Marital Status</label>
                                        <select name="marital_status" class="form-control" autocomplete="off">
                                            @php
                                                $options = ['Single', 'Married', 'Widowed', 'Separated', 'Not Specified'];
                                                $oldValue = old('marital_status');
                                            @endphp
                                            @foreach ($options as $option)
                                                <option value="{{ $option }}" {{ $oldValue == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                        <input type="text" id="phone" class="form-control phone  @if($errors->has('phone')) is-invalid @endif" name="phone" value="{{old('phone')}}">
                                        @if($errors->has('phone'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-3">
                                        <label for="email" class="form-label required">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" pattern="\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b">
                                    </div>
                                    <div class="col-3">
                                        <label for="remarks" class="form-label required">Remarks</label>
                                        <textarea name="remarks" class="form-control" rows="2" placeholder="Remarks">{{old('remarks')}}</textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country" value="{{old('country')}}" placeholder="Type Country">
                                    </div>
                                    <div class="col-4">
                                        <label for="city" class="form-label required">City</label>
                                        <input type="text" class="form-control" name="city" value="{{old('city')}}" placeholder="Type City">
                                    </div>
                                    <div class="col-4">
                                        <label for="address" class="form-label">Street Address</label>
                                        <textarea class="form-control" name="address" placeholder="Type Street Address">{{ old('address') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" style="margin-top:60px !important;">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title d-inline-block">Guardian Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="guardian_name" class="form-label required">Guardian Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @if($errors->has('guardian_name')) is-invalid @endif" name="guardian_name" value="{{old('guardian_name')}}" placeholder="Guardian Name">
                                        @if($errors->has('guardian_name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('guardian_name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label for="relation" class="form-label">Relation</label>
                                        <select name="relation" class="form-control @if($errors->has('relation')) is-invalid @endif">
                                            <option value="">Select</option>
                                            @php
                                                $relations = [
                                                    'Father',
                                                    'Mother',
                                                    'Brother',
                                                    'Sister',
                                                    'Cousin',
                                                    'Uncle'
                                                ];
                                                $oldRelation = old('relation');
                                            @endphp
                                            @foreach ($relations as $relation)
                                                <option value="{{ $relation }}" {{ $oldRelation == $relation ? 'selected' : '' }}>{{ $relation }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('relation'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('relation') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="g_phone" class="form-label">Phone No <span class="text-danger">*</span></label>
                                        <input type="text" id="g_phone" class="form-control phone @if($errors->has('g_phone')) is-invalid @endif" name="g_phone" value="{{old('g_phone')}}">
                                        @if($errors->has('g_phone'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('g_phone') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label for="g_email" class="form-label required">Guardian Email</label>
                                        <input type="email" class="form-control" name="g_email" value="{{old('g_email')}}" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3" style="margin-top:60px !important;">
                            <div class="card-header">
                                <h3 class="card-title d-inline-block">Medical History</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="disease" class="form-label">Disease</label>
                                        <select name="disease" class="form-control" autocomplete="off">
                                            <option value="">Select</option>
                                            <option value="Diabetes">Diabetes</option>
                                            <option value="Asthma">Asthma</option>
                                            <option value="Allergies">Allergies</option>
                                            <option value="Cancer">Cancer</option>
                                            <option value="Anxiety">Anxiety</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="no_of_visits" class="form-label">Number Of Visits (Doc)</label>
                                        <input type="number" class="form-control" name="no_of_visits" value="{{old('no_of_visits')}}">
                                    </div>
                                    <div class="col-4">
                                        <label for="doctor" class="form-label">Select Doctor</label>
                                        <select name="doctor" class="form-control" autocomplete="off">
                                            <option value="">Select</option>
                                            <option value="Amit Singh">Amit Singh (9009)</option>
                                            <option value="Reyan Jain">Reyan Jain (9011)</option>
                                            <option value="Sansa Gomez">Sansa Gomez (9008)</option>
                                            <option value="Sonai Bush">Sonia Bush (9002)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" style="margin-top:60px !important;">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title d-inline-block">
                                    Patient Medication
                                </h3>
                            </div>
                            <div class="card-body">
                                <div id="medicineRows">
                                    <div class="row mb-2 align-items-end medicine-row">
                                        <div class="col-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" class="form-control" name="date[]">
                                        </div>
                                        <div class="col-4">
                                            <label for="medicine" class="form-label">Medicine</label>
                                            <select name="medicine[]" class="form-control" autocomplete="off">
                                                <option value="">Select</option>
                                                <option value="Metformin">Metformin</option>
                                                <option value="Lisinopril">Lisinopril</option>
                                                <option value="Amoxicillin">Amoxicillin</option>
                                                <option value="Amlodipine">Amlodipine</option>
                                                <option value="Ibuprofen">Ibuprofen</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label for="dose" class="form-label">Dose</label>
                                            <select name="dose[]" class="form-control" autocomplete="off">
                                                <option value="">Select</option>
                                                <option value="1ml">1ml</option>
                                                <option value="1.5ml">1.5ml</option>
                                                <option value="5ml">5ml</option>
                                            </select>
                                        </div>
                                        <div class="col-1">
                                            <button type="button" class="btn btn-primary add-row-btn">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">Submit Form</button>
                    </div>
                </form>
            </div>



@endsection

@section('custom_scripts')
    <script>
        $(document).ready(function() {
            var today = new Date();
            var twentyYearsAgo = new Date(today.getFullYear() - 20, today.getMonth(), today.getDate());
            var formattedDate = twentyYearsAgo.toISOString().split('T')[0];
            $('#date_of_birth').val(formattedDate);
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.phone').inputmask('9999-9999999'); // Mask: 0333-3333333
        });
    </script>
    <script>
        $(document).ready(function() {

            // Function to add a new row
            function addRow() {
                var newRow = `
            <div class="row mb-2 align-items-end medicine-row">
                <div class="col-3">
                    <input type="date" class="form-control" name="date[]">
                </div>
                <div class="col-4">
                    <select name="medicine[]" class="form-control" autocomplete="off">
                        <option value="">Select</option>
                        <option value="Metformin">Metformin</option>
                        <option value="Lisinopril">Lisinopril</option>
                        <option value="Amoxicillin">Amoxicillin</option>
                        <option value="Amlodipine">Amlodipine</option>
                        <option value="Ibuprofen">Ibuprofen</option>
                    </select>
                </div>
                <div class="col-4">
                    <select name="dose[]" class="form-control" autocomplete="off">
                        <option value="">Select</option>
                        <option value="1">1ml</option>
                        <option value="1.5ml">1.5ml</option>
                        <option value="5ml">5ml</option>
                    </select>
                </div>
                <div class="col-1">
                    <button type="button" class="btn btn-danger remove-row-btn">-</button>
                </div>
            </div>
        `;
                $('#medicineRows').append(newRow);
            }

            // Event listener for the add button
            $('#medicineRows').on('click', '.add-row-btn', function() {
                addRow();
            });

            // Event listener for the remove button
            $('#medicineRows').on('click', '.remove-row-btn', function() {
                $(this).closest('.medicine-row').remove();
            });
        });

    </script>
@endsection
