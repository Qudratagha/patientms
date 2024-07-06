@extends('layouts.main')
@section('title', 'Edit User')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
	<div class="card card-default color-palette-box">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-user"></i> Edit User
            </h3>
        </div>
        <div class="card-body">
			<form class="form-horizontal" action="{{ route('users.update',$user->userID) }}" method="POST">
				@csrf
				@method('PUT')
                <div class="form-group row mb-2">
                    <label for="name" class="col-sm-2 col-form-label">{{__('menu.active')}}: *</label>
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" name="statusID" id="yes" value="1" @if(old('statusID',$user->statusID) == '1') checked @endif > Yes
						</label>&nbsp;&nbsp;
						<label class="radio-inline">
							<input type="radio" name="statusID" id="no" value="0" @if(old('statusID',$user->statusID) == '0') checked @endif > No
						</label>
					</div>
                </div>
				<div class="form-group row mb-2 {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 col-form-label">{{__('menu.name')}}: *</label>
					<div class="col-sm-10">
	                    <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="{{ old('name',$user->name) }}">
	                    @if($errors->has('name'))
	                        <em class="invalid-feedback">
	                            {{ $errors->first('name') }}
	                        </em>
	                    @endif
					</div>
                </div>
				<div class="form-group row mb-2 {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="col-sm-2 col-form-label">{{__('menu.email')}}: *</label>
					<div class="col-sm-10">
	                    <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email',$user->email) }}">
	                    @if($errors->has('email'))
	                        <em class="invalid-feedback">
	                            {{ $errors->first('email') }}
	                        </em>
	                    @endif
					</div>
                </div>
				<div class="form-group row mb-2">
                    <label for="password" class="col-sm-2 col-form-label">{{__('menu.password')}}:</label>
					<div class="col-sm-10">
                    	<input type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif">
                        @if($errors->has('email'))
                            <em class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </em>
                        @endif
					</div>
                </div>
				<div class="form-group row mb-2 {{ $errors->has('roleID') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 col-form-label">{{__('menu.roles')}}: *</label>
					<div class="col-sm-10">
						@foreach ($roles as $role)
							<div class="checkbox @if($errors->has('roleID')) is-invalid @endif">
								<label>
									<input type="checkbox" name="roleID[]" value="{{$role->roleID}}"
									{{ (is_array(old('roleID',$userRoles)) && in_array($role->roleID, old('roleID',$userRoles))) ? ' checked' : '' }}
									> {{$role->roleName}}
								</label>
							</div>
						@endforeach
						@if($errors->has('roleID'))
	                        <em class="invalid-feedback">
	                            {{ $errors->first('roleID') }}
	                        </em>
	                    @endif
					</div>
                </div>
                <div class="row mt-2 offset-2">
                    <input class="btn btn-primary" type="submit" value="Update">
                </div>
            </form>
        </div>
    </div>
@stop
