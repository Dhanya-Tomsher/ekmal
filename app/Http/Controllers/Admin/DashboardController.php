<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Models\Blog;
use App\Models\Clients;
use App\Models\Services;
use App\Models\Course;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth()->user()->user_type === 1){
                return $next($request);
            }else{
                return redirect()->route('account');
            }
        });
    }

    public function index()
    {
        $countEnquiry = Contact::count();
        $countClients = Clients::count();
        $countServices = Services::count();
        $countCourses = Course::count();

        return view('admin.dashboard')->with([
            'countEnquiry' => $countEnquiry,
            'countClients' => $countClients,
            'countServices' => $countServices,
            'countCourses' => $countCourses
        ]);
    }

    public function search(Request $request)
    {
        $searchResults = [];
        // $searchResults = (new Search())
        //     ->registerModel(News::class, 'title')
        //     ->registerModel(Pages::class, ['title', 'page_name'])
        //     ->search($request->q);

        return view('admin.search')->with(['searchResults' => $searchResults]);
    }
}
