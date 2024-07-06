@extends('layouts.main')
@section('title','Users')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                    {{--                    <li class="breadcrumb-item active">Starter Page</li>--}}
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
            <i class="fas fa-user"></i> Users
        </h3>
        <div class="card-actions d-inline-block float-end">
            @can('user_create')
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Add User
                </a>
            @endcan
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-user">
            <thead>
            <tr>
                <th> Name </th>
                <th> Email </th>
                <th> User Type</th>
                <th> Role </th>
                <th> Date Created</th>
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
            ajax: "{{ route('users.index') }}",
            columns: [
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'userType', name: 'userType' },
                { data: 'roles', name: 'roles' },
                { data: 'dateCreated', name: 'dateCreated' },
                { data: 'actions', name: 'Actions' }
            ],
            order: [[ 0, 'desc' ]],
            pageLength: 100,
        };

        $('.datatable-user').DataTable(dtOverrideGlobals);
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });
</script>
@endsection
