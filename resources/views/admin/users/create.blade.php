@extends('layouts.main')
@section('title', 'New User')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
                <h4 class="mb-sm-0 font-size-16 fw-bold">Users</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
	<div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-user"></i> New User
            </h3>
        </div>
        <div class="card-body">
			<form action="{{ route('users.store') }}" method="POST">
				@csrf
                <div class="form-group row mb-2">
                    <label for="name" class="col-sm-2 required form-label">{{__('menu.active')}}:</label>
					<div class="col-sm-10">
						<label class="form-check form-check-inline">
							<input type="radio" class="form-check-input" name="statusID" value="1" @if(old('statusID') == null || (old('statusID') == '1')) checked @endif > <span class="form-check-label">Yes</span>
                        </label>&nbsp;&nbsp;
						<label class="form-check form-check-inline">
							<input type="radio" class="form-check-input" name="statusID" value="0" @if(old('statusID') == '0') checked @endif> <span class="form-check-label">No</span>
						</label>
					</div>
                </div>
				<div class="form-group row mb-2 {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 required form-label">{{__('menu.name')}}: </label>
					<div class="col">
	                    <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="{{ old('name') }}" >
	                    @if($errors->has('name'))
	                        <em class="invalid-feedback">
	                            {{ $errors->first('name') }}
	                        </em>
	                    @endif
					</div>
                </div>
				<div class="form-group row mb-2 {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="col-sm-2 required form-label">{{__('menu.email')}}: </label>
					<div class="col-sm-10">
	                    <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}" >
	                    @if($errors->has('email'))
	                        <em class="invalid-feedback">
	                            {{ $errors->first('email') }}
	                        </em>
	                    @endif
					</div>
                </div>
				<div class="form-group row mb-2 {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password" class="col-sm-2 required form-label">{{__('menu.password')}}: </label>
					<div class="col-sm-10">
	                    <input type="password" name="password" class="form-control @if($errors->has('password') || $errors->has('confirmPassword')) is-invalid @endif" >
	                    @if($errors->has('password'))
	                        <em class="invalid-feedback">
	                            {{ $errors->first('password') }}
	                        </em>
	                    @endif
						@if($errors->has('confirmPassword'))
	                        <em class="invalid-feedback">
	                            {{ $errors->first('confirmPassword') }}
	                        </em>
	                    @endif
					</div>
                </div>
				<div class="form-group row mb-2">
                    <label for="password" class="col-sm-2 required form-label">{{__('menu.confirm_password')}}: </label>
					<div class="col-sm-10">
                    	<input type="password" name="confirmPassword" class="form-control">
					</div>
                </div>
				<div class="form-group row mb-2 {{ $errors->has('roleID') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 required form-label">{{__('menu.roles')}}: </label>
					<div class="col-sm-10">
						@foreach ($roles as $role)
							<div class="checkbox @if($errors->has('roleID')) is-invalid @endif">
								<label>
									<input type="checkbox" name="roleID[]" value="{{$role->roleID}}"
									{{ (is_array(old('roleID')) && in_array($role->roleID, old('roleID'))) ? ' checked' : '' }}
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
                <div class="mt-2 offset-2">
                    <input class="btn btn-primary" type="submit" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection
