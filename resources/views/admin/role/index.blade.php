@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
{{--                        <li class="breadcrumb-item"><a href="{{route('role.index')}}">Role</a></li>--}}
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-fluid">
            @include('partials.message')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-inline-block">
                        <i class="fas fa-user"></i> Roles
                    </h3>
                    <div class="card-actions d-inline-block float-end">
                        @can('roles_create')
                            <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Add Role
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <table class="datatable-role table table-bordered table-striped table-hover ajaxTable datatable">
                        <thead>
                        <tr>
                            <th>{{__('menu.role')}}</th>
                            <!-- <th>Description</th> -->
                            <th>{{__('menu.privileges')}}</th>
                            <!-- <th>Date Created</th> -->
                            <th>{{__('global.actions')}}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('custom_scripts')

<script>
    $(function () {
        let dtOverrideGlobals = {
            processing: true,
            serverSide: true,
            retrieve: true,
            aaSorting: [],
            ajax: "{{ route('role.index') }}",
            columns: [
                { data: 'roleName', name: 'roleName' },
                // { data: 'description', name: 'description' },
                { data: 'privileges', name: 'privileges' },
                // { data: 'dateCreated', name: 'dateCreated' },
                { data: 'actions', name: 'Actions' }
            ],
            order: [[ 0, 'desc' ]],
            pageLength: 100,
        };

        $('.datatable-role').DataTable(dtOverrideGlobals);
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });
</script>
@stop
