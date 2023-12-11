@extends('layouts.app.main')
@section('content')
 <section class="login-area">
        <div class="container login-section">
            <div class="login-img">
                <img src="assets/images/login-img.jpg" alt="">
            </div>
            <div class="login-form">
                <h3 class="innerpage-login-title text-white mb-4">Login</h3>
                <form action="{{ route('checklogin') }}" method="post">
                @csrf
                    <div class="input-area mb-4">
                        <!-- <label for="username">Username:</label> -->
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>

                    <div class="input-area mb-4">
                        <!-- <label for="password">Password:</label> -->
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>

                    <!-- forgot password -->
                    <!-- <div class="forgot-password">
                        <input class="forgot-password-checkbox" type="checkbox" id="forgotPassword" name="forgotPassword">
                        <label for="forgotPassword">Forgot Password?</label>
                    </div> -->

                    <button class="btn btn-primary-stroke login-btn">
                        <span> Submit Now</span> 
                        <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                     </button>
                </form>
            </div>
        </div>
    </section>
    @endsection