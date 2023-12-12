<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/course/{slug}', [FrontendController::class, 'courseDetails'])->name('course-details');
Route::get('/courses', [FrontendController::class, 'courses'])->name('courses');
Route::get('/blog/{slug}', [FrontendController::class, 'blogDetails'])->name('blog-details');
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/careers', [FrontendController::class, 'careers'])->name('careers');
Route::get('/privacy', [FrontendController::class, 'privacy'])->name('privacy');
Route::get('/terms', [FrontendController::class, 'terms'])->name('terms');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/service/{slug}', [FrontendController::class, 'serviceDetails'])->name('service-details');
Route::get('/search-blog', [FrontendController::class, 'searchBlog'])->name('search-blog');
Route::get('/edit-profile', [FrontendController::class, 'editProfile'])->name('edit-profile');


Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/store-contact', [FrontendController::class, 'storeContact'])->name('store-contact');
Route::post('/store-serviceenquiry', [FrontendController::class, 'storeServiceenquiry'])->name('store-serviceenquiry');
Route::get('/course-apply/{slug}', [FrontendController::class, 'courseApply'])->name('course-apply');
Route::post('/apply-course', [FrontendController::class, 'storeCourseApply'])->name('apply-course');


Route::get('/signup', [CustomAuthController::class, 'register'])->name('signup');
Route::post('/store-register', [CustomAuthController::class, 'postRegister'])->name('store-register');
Route::get('/signin', [CustomAuthController::class, 'index'])->name('signin');
Route::post('/customLogin', [CustomAuthController::class, 'customLogin'])->name('customLogin');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::group(['middleware' => ['auth','web']], function () {

    Route::get('/account', [FrontendController::class, 'account'])->name('account');

    Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
});

include_once('admin.php');
