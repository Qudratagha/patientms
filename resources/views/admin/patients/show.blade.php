@extends('layouts.main')
@section('title', 'Patient Details')
@section('content')
    <div class="container">
        <!-- Patient Details Card -->
        <div class="text-end mb-3">
            <a class="btn btn-primary d-none d-sm-inline-block" href="{{route('patients.edit', $patient->id)}}">
                <i class="fas fa-newspaper"></i> Edit Patient
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                Patient Details
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $patient->name }}</h5>
                <p class="card-text">
                    <strong>Date of Birth:</strong> {{ $patient->date_of_birth ?? '' }}<br>
                    <strong>Gender:</strong> {{ $patient->gender ? 'Male' : 'Female' }}<br>
                    <strong>Blood Group:</strong> {{ $patient->blood_group ?? '' }}<br>
                    <strong>Marital Status:</strong> {{ $patient->marital_status ?? '' }}<br>
                    <strong>Phone:</strong> {{ $patient->phone ?? '' }}<br>
                    <strong>Email:</strong> {{ $patient->email ?? '' }}<br>
                    <strong>Country:</strong> {{ $patient->country ?? '' }}<br>
                    <strong>City:</strong> {{ $patient->city ?? '' }}<br>
                    <strong>Address:</strong> {{ $patient->address ?? '' }}<br>
                    <strong>Remarks:</strong> {{ $patient->remarks ?? '' }}<br>
                </p>
            </div>
        </div>

        <!-- Guardian Details Card -->
        <div class="card mb-4">
            <div class="card-header">
                Guardian Details
            </div>
            <div class="card-body">
                    <h5 class="card-title">{{ $patient->guardian->guardian_name ?? '' }}</h5>
                    <p class="card-text">
                        <strong>Relation:</strong> {{ $patient->guardian->relation ?? '' }}<br>
                        <strong>Phone:</strong> {{ $patient->guardian->g_phone ?? ''}}<br>
                        <strong>Email:</strong> {{ $patient->guardian->g_email ?? '' }}<br>
                    </p>
                    <hr>
            </div>
        </div>

        <!-- Medical History Card -->
        <div class="card mb-4">
            <div class="card-header">
                Medical History
            </div>
            <div class="card-body">
                    <h5 class="card-title">{{ $patient->medicalHistory->disease ?? '' }}</h5>
                    <p class="card-text">
                        <strong>No. of Visits:</strong> {{ $patient->medicalHistory->no_of_visits ?? '' }}<br>
                        <strong>Doctor:</strong> {{ $patient->medicalHistory->doctor ?? '' }}<br>
                    </p>
                    <hr>
            </div>
        </div>

        <!-- Medications Card -->
        <div class="card mb-4">
            <div class="card-header">
                Medications
            </div>
            <div class="card-body">
                @foreach($patient->medications as $medication)
                    <h5 class="card-title">{{ $medication->medicine ?? ''  }}</h5>
                    <p class="card-text">
                        <strong>Date:</strong> {{ $medication->date ?? '' }}<br>
                        <strong>Dose:</strong> {{ $medication->dose ?? '' }}<br>
                    </p>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection

