@extends('layouts.app.main')
@section('content')
 <section class="login-area">
        <div class="container login-section">
            <div class="login-img">
                <img src="{{ asset('assets/images/login-img.jpg') }}" alt="">
            </div>
            <div class="login-form">
                <h3 class="innerpage-login-title text-white mb-4">Forgot Password</h3>
                <h6>No worries! Let us know your email and we'll send you a password reset link.</h6>

                @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <form action="{{ route('forget.password.post') }}" method="post" autocomplete="off">
                @csrf
                    <div class="input-area mb-4">
                        <!-- <label for="username">Username:</label> -->
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email"  autocomplete="off" value="{{ old('email') }}">
                        <x-input-error  name="email" />
                    </div>

                    
                    <!-- forgot password -->
                    <!-- <div class="forgot-password">
                        <input class="forgot-password-checkbox" type="checkbox" id="forgotPassword" name="forgotPassword">
                        <label for="forgotPassword">Forgot Password?</label>
                    </div> -->

                    <button class="btn btn-primary-stroke login-btn">
                        <span> Send Password Reset Link</span> 
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