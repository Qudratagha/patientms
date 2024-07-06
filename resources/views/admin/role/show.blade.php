@extends('layouts.main')
@section('title', 'Role')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('role.index')}}">Role</a></li>
                        <li class="breadcrumb-item active">Show Role</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title d-inline-block">
                <i class="fas fa-user-tag"></i> {{ $role->roleName }}
            </h3>
            <div class="card-actions d-inline-block float-end">
                @can('roles_update')
                <a class="btn btn-primary btn-sm " href="{{ route("role.edit",$role->roleID) }}">
                    <i class="fas fa-edit"></i> Edit Role
                </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
			<dt>
				<dd class="font-weight-bold">{{__('menu.role_name')}}: </dd>
				<dl>{{ $role->roleName }}</dl>
				<dd class="font-weight-bold">{{__('menu.description')}}: </dd>
				<dl>{{ $role->description }}</dl>
                <dd class="font-weight-bold">{{__('menu.created_on')}}: </dd>
				<dl>{{ $role->dateCreated}}</dl>
				<dd class="font-weight-bold">{{__('menu.role_privileges')}}: </dd>
				<dl>
					<table class="table">
						@php
							$moduleID = 0;
						@endphp
						@foreach ($role->privileges as $rolePrivileges)
							@php
								if ($moduleID != $rolePrivileges->moduleID) {
									if ($moduleID != 0) {
										echo '</tr>';
									}
									echo '<tr><td><label>' . $rolePrivileges->modules->moduleName . '</label></td>';
									$moduleID = $rolePrivileges->moduleID;
								}
							@endphp
							<td>{{ $rolePrivileges->privilegeName }}</td>
						@endforeach
					</table>
				</dl>
			</dt>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
