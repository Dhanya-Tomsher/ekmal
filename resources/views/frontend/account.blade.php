@extends('layouts.app.main')
@section('content')
    <!-- my account section -->
    <section class="my-account-section">
        <div class="container">
            <h3 class="my-account-page-title mb-4">My Account</h3>
            <div class="account-header-section">
                <span class="profile-pic">
                    <img src="assets/images/featured-img1.jpg" alt="">
                </span>
                <div class="user-detail">
                    <h3 class="mb-1">Alex Thompson</h3>
                    <p>Student</p>
                </div>
            </div>
            <div class="my-accounts-tab-area">
                <ul class="nav nav-tabs my-accounts-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="courses-tab" data-bs-toggle="tab" data-bs-target="#courses" type="button" role="tab" aria-controls="courses" aria-selected="false">My Courses<span>5</span></button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <!-- profile tab -->
                    <div class="tab-pane account-detail-tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="update-profile">
                            <p class="m-0 ms-2"><i class="bi bi-info-circle me-2"></i>Would you like to make changes to your profile?</p>
                            <button class="edit-profile-btn"><i class="bi bi-pencil-square me-2"></i>Edit Profile</button>
                        </div>
                        <!-- profile detailed information -->
                        <div class="profile-info mt-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="fw-normal">Full Name</p>
                                </div>
                                <div class="col-md-9">
                                    <p class="fw-bold">Alex Thompson</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="fw-normal">Email Address</p>
                                </div>
                                <div class="col-md-9">
                                    <p class="fw-bold">alexthompson@gmail.com</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="fw-normal">Phone Number</p>
                                </div>
                                <div class="col-md-9">
                                    <p class="fw-bold">32498 23483 4343</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- my courses tab -->
                    <div class="tab-pane account-detail-tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                        <div class="update-course">
                            <p class="m-0 ms-2"><i class="bi bi-info-circle me-2"></i>Would you like to make changes to your profile?</p>
                            <button class="edit-profile-btn"><i class="bi bi-plus-lg me-2"></i>Add Courses</button>
                        </div>
                        <!-- course list -->
                        <div class="course-list mt-3">
                            <div class="course">
                                <div class="course-img">
                                    <img src="assets/images/course-img-1.jpg" alt="">
                                </div>
                                <div class="course-info-area w-100">
                                    <div class="course-info">
                                        <h3>Engineering Courses: Design, Infrastructure, and Transport</h3>
                                        <p class="m-0">Integrated Technology Solutions, providing Customized Software Development, Cuttingedge IT Solutions</p>
                                    </div>
                                    <div class="course-action mt-3">
                                        <!-- resume course -->
                                        <a href="#" class="btn btn-primary-stroke resume-course-btn">
                                            <span>Resume Course</span> 
                                            <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                               <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                         </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </section>

@endsection
