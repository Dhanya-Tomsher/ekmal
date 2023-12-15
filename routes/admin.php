<?php

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\Users\ProfileController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\ContactdetailsController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CoursecategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\ServiceslistController;
use App\Http\Controllers\Admin\DynamiccontentsController;
use App\Http\Controllers\Admin\CareersController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => env('ADMIN_PREFIX', 'admin'), 'as' => 'admin.'], function () {

    Route::get('/', function () {
        // dd( auth()->user()->can('manage-distributor') );
        return redirect()->route('admin.dashboard');
    });

    Route::middleware(['auth', 'auth.session'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/slider', [SliderController::class, 'index'])->name('slider');
        Route::get('/services', [ServicesController::class, 'index'])->name('services');
        Route::get('/serviceslist', [ServiceslistController::class, 'index'])->name('serviceslist');
        Route::get('/coursecategory', [CoursecategoryController::class, 'index'])->name('coursecategory');
        Route::get('/course', [CourseController::class, 'index'])->name('course');
        Route::get('/contact', [ContactController::class, 'index'])->name('contact');
        Route::get('/contactdetails', [ContactdetailsController::class, 'index'])->name('contactdetails');
        Route::get('/banners', [BannerController::class, 'index'])->name('banners');
        Route::get('/careers', [BannerController::class, 'index'])->name('careers');
        Route::get('/faq', [FaqController::class, 'index'])->name('faq');
        Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
        Route::get('/search', [DashboardController::class, 'search'])->name('search');
        Route::get('/dynamiccontentsController', [DynamiccontentsController::class, 'index'])->name('dynamiccontentsController');

       Route::get('/settings', [PagesController::class, 'generalSettings'])->name('settings');
        Route::post('/store-settings', [PagesController::class, 'storeSettings'])->name('store-settings'); 

        Route::get('/enquiries', [PagesController::class, 'enquiries'])->name('enquiries');
        Route::get('/careersapplication', [PagesController::class, 'careersapplication'])->name('careersapplication');
        Route::get('/usercourses', [PagesController::class, 'usercourses'])->name('usercourses');

        // Logged-in user profile
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/profile', function () {
                return view('admin.users.profile');
            })->name('profile');

            Route::put('/password-update', [ProfileController::class, 'updatePassword'])->name('password-update');
            Route::put('/profile-update', [ProfileController::class, 'updateProfile'])->name('profile-update');
            Route::post('/logout-everywhere', [ProfileController::class, 'logoutEverywhere'])->name('logout-everywhere');
        });

        // All Users 
        Route::resource('users', UserController::class);

        // Clients
        Route::resource('clients', ClientsController::class)->except('show');
        Route::resource('blogs', BlogsController::class)->except('show');
        Route::resource('banners', BannersController::class)->except('show');
        Route::resource('careers', CareersController::class)->except('show');
        Route::resource('slider', SliderController::class)->except('show');
        Route::resource('services', ServicesController::class)->except('show');
        Route::resource('contact', ContactController::class)->except('show');
        Route::resource('contactdetails', ContactdetailsController::class)->except('show');
        Route::resource('serviceslist', ServiceslistController::class)->except('show');
        Route::resource('coursecategory', CoursecategoryController::class)->except('show');
        Route::resource('course', CourseController::class)->except('show');
        Route::resource('faq', FaqController::class)->except('show');

        Route::resource('dynamiccontents', DynamiccontentsController::class)->except('show');

        // Services
       /* Route::resource('services', ServiceController::class)->except('show');

        // Reels
        Route::resource('reels', ReelsController::class)->except('show');

        Route::get('/training', [PagesController::class, 'homePage'])->name('training.index');

        Route::get('/consulting', [PagesController::class, 'homePage'])->name('consulting.index');*/

      /*  Route::group(['prefix' => 'pages', 'as' => 'page.'], function () {
           
            Route::get('/home', [PagesController::class, 'homePage'])->name('home');
            Route::post('/store-home', [PagesController::class, 'storeHomePage'])->name('store-home');

            Route::get('/about', [PagesController::class, 'aboutPage'])->name('about');
            Route::post('/store-about', [PagesController::class, 'storeAboutPage'])->name('store-about');

            Route::get('/services', [PagesController::class, 'servicesPage'])->name('services');
            Route::post('/store-services', [PagesController::class, 'storeServicesPage'])->name('store-services');

            Route::get('/clients', [PagesController::class, 'clientsPage'])->name('clients');
            Route::post('/store-clients', [PagesController::class, 'storeClientsPage'])->name('store-clients');
           
            Route::get('/contact', [PagesController::class, 'contactPage'])->name('contact');
            Route::post('/store-contact', [PagesController::class, 'storeContactPage'])->name('store-contact');

            Route::get('/reels', [PagesController::class, 'reelsPage'])->name('reels');
            Route::post('/store-reels', [PagesController::class, 'storeReelsPage'])->name('store-reels');

            Route::get('/social', [PagesController::class, 'socialPage'])->name('social');
            Route::post('/store-social', [PagesController::class, 'storeSocialPage'])->name('store-social');
        });*/

        Route::resource('roles', RoleController::class);
    });
});
