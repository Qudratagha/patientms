@extends('layouts.main')
@section('title','Patients')
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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title d-inline-block">
                <i class="fas fa-user"></i> Patients
            </h3>
            <div class="card-actions d-inline-block float-end">
                @can('user_create')
                    <a href="{{ route('patients.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Patient
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Search Name" id="search-name">
            </div>
            <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-user">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Name </th>
                    <th> Date of Birth </th>
                    <th> Gender </th>
                    <th> Country </th>
                    <th> City </th>
                    <th> Address</th>
                    <th> Phone </th>
                    <th> Email </th>
                    <th> Actions </th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('custom_scripts')
    <script>
        $(function () {
            let dtOverrideGlobals = {
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: {
                    url: "{{ route('patients.index') }}",
                    data: function (d) {
                        d.name = $('#search-name').val();
                    }
                },
                columns: [
                    { data: 'id', name: 'id', searchable: true },
                    { data: 'name', name: 'name', searchable: true },
                    { data: 'date_of_birth', name: 'date_of_birth', searchable: true },
                    { data: 'gender', name: 'gender' , searchable: true},
                    { data: 'country', name: 'country', searchable: true },
                    { data: 'city', name: 'city', searchable: true },
                    { data: 'address', name: 'address', searchable: true },
                    { data: 'phone', name: 'phone', searchable: true },
                    { data: 'email', name: 'email', searchable: true },
                    { data: 'actions', name: 'Actions', searchable: true }
                ],
                order: [[ 0, 'asc' ]],
                pageLength: 20,
            };
            let table = $('.datatable-user').DataTable(dtOverrideGlobals);

            $('#search-name').on('keyup', function () {
                table.ajax.reload();
            });

            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });

            // $('.datatable-user').DataTable(dtOverrideGlobals);

            // let table = $('.datatable-user').DataTable(dtOverrideGlobals);
            //
            // $('#search-name').on('keyup', function () {
            //     table.ajax.reload();
            // });
            //
            // $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            //     $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            // });
        });
    </script>
@endsection
