@extends('layouts.main')
@section('title', 'User')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
                        <li class="breadcrumb-item active">Show User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title d-inline-block">
                <i class="fas fa-user"></i> {{ $user->name }}
            </h3>
            <div class="card-actions d-inline-block float-end">
                @can('user_update')
                <a class="btn btn-primary" href="{{ route("users.edit",$user->userID) }}">
                    <i class="fas fa-edit"></i> Edit User
                </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
			<dt>
				<dd class="font-weight-bold">{{__('menu.name')}}: </dd>
				<dl>{{ $user->name}}</dl>
				<dd class="font-weight-bold">{{__('menu.email')}}: </dd>
				<dl><a href="mailto:{{ $user->email}}">{{ $user->email}}</a></dl>
				<dd class="font-weight-bold">{{__('menu.user_type')}}: </dd>
				<dl>{{ $user->userType->userType}}</dl>
				<dd class="font-weight-bold">{{__('menu.user_roles')}}: </dd>
				<dl>
					@foreach ($user->roles as $userRole)
						<span class="badge badge-info">{{$userRole->roleName}}</span>
					@endforeach
				</dl>
				<dd class="font-weight-bold">{{__('menu.create_on')}}: </dd>
				<dl>{{ $user->dateCreated}}</dl>
			</dt>
        </div>
    </div>
@stop

