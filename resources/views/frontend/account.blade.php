@extends('layouts.app.main')
@section('content')
<?php

use App\Models\Usercourses;
use App\Models\Course;
$user = Auth()->user();
$usecourses = Usercourses::where('user_id', '=', $user->id)->get();
?>
    <!-- my account section -->
    <section class="my-account-section">
        <div class="container">
            <h3 class="my-account-page-title mb-4">My Account</h3>
            <div class="account-header-section">
                <!-- <span class="profile-pic">
                    <img src="assets/images/featured-img1.jpg" alt="">
                </span> -->
                <div class="user-detail">
                    <h3 class="mb-1">{{ $user->name; }}</h3>
                    <p>{{ $user->email; }}</p>
                </div>
            </div>
            <div class="my-accounts-tab-area">
                <ul class="nav nav-tabs my-accounts-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="courses-tab" data-bs-toggle="tab" data-bs-target="#courses" type="button" role="tab" aria-controls="courses" aria-selected="false">My Courses<span>{{ count($usecourses) }}</span></button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <!-- profile tab -->
                    <div class="tab-pane account-detail-tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="update-profile">
                            <p class="m-0 ms-2"><i class="bi bi-info-circle me-2"></i>Would you like to make changes to your profile?</p>
                            <a class="edit-profile-btn" href="{{ route('edit-profile') }}"><i class="bi bi-pencil-square me-2"></i>Edit Profile</a>
                        </div>
                        <!-- profile detailed information -->
                        <div class="profile-info mt-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="fw-normal">Name</p>
                                </div>
                                <div class="col-md-9">
                                    <p class="fw-bold">{{ $user->name; }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="fw-normal">Email Address</p>
                                </div>
                                <div class="col-md-9">
                                    <p class="fw-bold">{{ $user->email; }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="fw-normal">Phone Number</p>
                                </div>
                                <div class="col-md-9">
                                    <p class="fw-bold">{{ $user->phone_number; }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- my courses tab -->
                    <div class="tab-pane account-detail-tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                        <div class="update-course">
                            <p class="m-0 ms-2"><i class="bi bi-info-circle me-2"></i>Would you like to make changes to your profile?</p>
                            <!-- <button class="edit-profile-btn"><i class="bi bi-plus-lg me-2"></i>Add Courses</button> -->
                        </div>
                        <!-- course list -->
                        
                        @if($usecourses)
                        @foreach ($usecourses as $usecourse)
                        <?php
                        $cours = Course::find($usecourse->course_id);
                        ?>
                        <div class="course-list mt-3">
                            <div class="course">
                                <div class="course-img">
                                    <img src="{{ $cours->image; }}" alt="">
                                </div>
                                <div class="course-info-area w-100">
                                    <div class="course-info">
                                        <h3>{{ $cours->title; }}</h3>
                                        <p class="m-0">{{ $cours->description; }}</p>
                                    </div>
                                    <div class="course-action mt-3">
                                        <!-- resume course -->
                                        <a href="{{ route('course-details', ['slug' => $cours->slug]) }}" class="btn btn-primary-stroke resume-course-btn">
                                            <span>View Course</span> 
                                            <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                               <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                         </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                  </div>
            </div>
        </div>
    </section>

@endsection
