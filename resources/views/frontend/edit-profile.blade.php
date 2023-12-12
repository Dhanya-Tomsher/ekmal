@extends('layouts.app.main')
@section('content')
<!-- login section -->
    <section class="login-area">
        <div class="container login-section">
            <div class="login-img">
                <img src="assets/images/register.jpg" alt="">
            </div>
            <div class="login-form">
                <h3 class="innerpage-login-title text-white mb-4">Edit Profile</h3>
                <form action="{{ route('store-registerupdate') }}" method="post" autocomplete="off">
                @csrf
                    <div class="input-area mb-4">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                        <x-input-error  name="name" value="{{ old('name', $user->name) }}" />
                    </div>

                    <div class="input-area mb-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        <x-input-error  name="email" value="{{ old('email', $user->email) }}"  />
                    </div>

                    <div class="input-area mb-4">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
                        <x-input-error  name="phone" value="{{ old('phone', $user->phone) }}" />
                    </div>

                    <div class="input-area mb-4">
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Password" value="{{ old('new_password') }}" autocomplete="new-password">
                        <x-input-error  name="new_password" />
                    </div>

                    <div class="input-area mb-4">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-Enter Password" value="{{ old('confirm_password') }}" autocomplete="new-password">
                        <x-input-error  name="confirm_password" />
                    </div>

                    <button class="btn btn-primary-stroke login-btn">
                        <span> Update Profile</span> 
                        <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                     </button>
                </form>          
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