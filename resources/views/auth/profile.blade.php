@extends('layouts.main')
@section('title','Profile')
@section('content')
    <div class="container-fluid content-area">
        <div class="sideapp">
            <!-- page-header -->
            <div class="page-header mt-0 mb-0">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">User List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Profile') }}</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->
            <div class="row">
                <div class="col-md-12">
                @include('partials.message')
                    <form action="{{ route('profile.update') }}" method="POST" class="card" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required>
                            </div>
                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <div class="mb-3">
                                <label class="form-label required">{{ __('Email address') }}</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>
                            </div>
                            @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="form-label required">Old Password</label>
                                <input type="password" class="form-control" name="oldPassword" placeholder="Enter Old Password">
                                @if($errors->has('oldPassword'))
                                    <div class="text-danger">
                                        {{ $errors->first('oldPassword') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">{{ __('New password') }}</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('New password') }}">
                            </div>
                            @if($errors->has('password'))
                                <div class="text-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label required">{{ __('New password confirmation') }}</label>
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('New password confirmation') }}" autocomplete="new-password">
                            </div>
                            @if($errors->has('password_confirmation'))
                                <div class="text-danger">
                                    {{ $errors->first('password_confirmation') }}
                                </div>
                            @endif
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
