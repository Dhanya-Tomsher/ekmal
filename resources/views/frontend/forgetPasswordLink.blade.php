@extends('layouts.app.main')
@section('content')
 <section class="login-area">
        <div class="container login-section">
            <div class="login-img">
                <img src="{{ asset('assets/images/login-img.jpg') }}" alt="">
            </div>
            <div class="login-form">
                <h3 class="innerpage-login-title text-white mb-4">Reset Password</h3>
                <h6>No worries! Let us know your email and we'll send you a password reset link.</h6>

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        <strong>{{ session()->get('error') }}</strong>
                    </div>
                @endif

                <form action="{{ route('reset.password.post') }}" method="post" autocomplete="off">
                @csrf
                    <div class="input-area mb-4">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <!-- <label for="username">Username:</label> -->
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email"  autocomplete="off" value="{{ old('email') }}">
                        <x-input-error  name="email" />
                    </div>

                    
                    <div class="input-area mb-4">
                        <!-- <label for="password">Password:</label> -->
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"  autocomplete="off" value="{{ old('password') }}">
                        <x-input-error  name="password" />
                    </div>

                    <div class="input-area mb-4">
                        <!-- <label for="password">Password:</label> -->
                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Confirm Password"  autocomplete="off" value="{{ old('password_confirmation') }}">
                        <x-input-error  name="password_confirmation" />
                    </div>

                    <button class="btn btn-primary-stroke login-btn">
                        <span> Reset Password</span> 
                        <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                     </button>

                     <x-danger />
                </form>

                <span class="text-white">Not registered yet? <a class="btn btn-link" href="{{ route('signup') }}"> Register Here</a></span>
                <br>
                <span class="text-white">Already have an account? <a class="btn btn-link" href="{{ route('signin') }}"> Login Here</a></span>
            </div>
        </div>
    </section>
    @endsection

    @push('header')
        <style>
        .form-control {
            color: #000 !important;
        }
        </style>
    @endpush