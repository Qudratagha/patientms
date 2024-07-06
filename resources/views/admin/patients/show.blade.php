@extends('layouts.main')
@section('title', 'Patient Show')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-blog"></i> Patient Details
            </h3>
            <div class="card-actions">
                <a class="btn btn-primary d-none d-sm-inline-block" href="{{route('patients.edit', $patients->id)}}">
                    <i class="fas fa-newspaper"></i> Edit Patient
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive col-6">

            </div>

        </div>
    </div>
@endsection
