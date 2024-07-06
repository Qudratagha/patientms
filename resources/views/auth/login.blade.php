@extends('layouts.app')
@section('title','Login')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="text-center mb-5">
            <h5 class="display-6 fw-bold text-primary">Patient Management System</h5>
        </div>
        <div class="card overflow-hidden">
            <div class="row g-0">
                <div class="p-lg-5 p-4">
                    <div>
                        <h5>Welcome Back !</h5>
                        <p class="text-muted">Sign in to continue.</p>
                    </div>
                    <div class="mt-4 pt-3">
                        <form  method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="fw-semibold">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3 mb-4">
                                <label for="password" class="fw-semibold">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">{{ __('Login') }}</button>
                                    </div>
                                </div>
                            </div>
                                <div class="mt-4">
                                    <a class="text-muted" href="{{ route('register') }}">
                                        <i class="mdi mdi-lock me-1"></i> Don't have account Register Now?
                                    </a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection
