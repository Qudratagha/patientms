@extends('layouts.main')
@section('title','Dashboard')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
            <h4 class="mb-sm-0 font-size-16 fw-bold">Dashboard</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
{{--                    <li class="breadcrumb-item active">Starter Page</li>--}}
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end">
                    <div class="avatar-sm mx-auto mb-4">
                        <span class="avatar-title rounded-circle bg-light font-size-24">
                            <i class="mdi mdi-account-group text-primary"></i>
                        </span>
                    </div>
                </div>
                <div>
                    <p class="text-muted text-uppercase fw-semibold font-size-13">Total Patients</p>
                    <h4 class="mb-1 mt-1">{{ $totalPatients }}</h4>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <!-- Additional information if needed -->
                </p>
            </div>
        </div>
    </div> <!-- end col-->
    <!-- Add more cards or content as needed -->
</div>

@endsection
