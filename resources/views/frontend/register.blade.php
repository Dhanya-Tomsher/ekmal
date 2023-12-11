@extends('layouts.app.main')
@section('content')
<!-- login section -->
    <section class="login-area">
        <div class="container login-section">
            <div class="login-img">
                <img src="assets/images/register.jpg" alt="">
            </div>
            <div class="login-form">
                <h3 class="innerpage-login-title text-white mb-4">Register</h3>
                <form action="{{ route('store-register') }}" method="post">
                @csrf
                    <div class="input-area mb-4">
                        <!-- <label for="username">Username:</label> -->
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>

                    <div class="input-area mb-4">
                        <!-- <label for="password">Password:</label> -->
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="input-area mb-4">
                        <!-- <label for="password">Password:</label> -->
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                        <!-- <input type="number" class="form-control" id="number" name="number" placeholder="Phone Number" required> -->
                    </div>

                    <div class="input-area mb-4">
                        <!-- <label for="password">Password:</label> -->
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>

                    <div class="input-area mb-4">
                        <!-- <label for="password">Password:</label> -->
                        <input type="password" class="form-control" id="password" name="password" placeholder="Re-Enter Password" required>
                    </div>

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