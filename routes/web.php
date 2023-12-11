<?php

use App\Http\Controllers\FrontendController;
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
Route::get('/register', [FrontendController::class, 'register'])->name('register');
Route::get('/userlogin', [FrontendController::class, 'userlogin'])->name('userlogin');
Route::post('/checklogin', [FrontendController::class, 'checklogin'])->name('checklogin');
Route::get('/account', [FrontendController::class, 'account'])->name('account');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/store-contact', [FrontendController::class, 'storeContact'])->name('store-contact');
Route::post('/store-serviceenquiry', [FrontendController::class, 'storeServiceenquiry'])->name('store-serviceenquiry');
Route::post('/store-register', [FrontendController::class, 'storeRegister'])->name('store-register');

Route::get('/course-apply/{slug}', [FrontendController::class, 'courseApply'])->name('course-apply');
Route::post('/apply-course', [FrontendController::class, 'storeCourseApply'])->name('apply-course');

include_once('admin.php');
