<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class ContactController extends Controller
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

   /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $contact = Contact::orderBy('sort_order','asc')->paginate(15);
        return view('admin.contact.index', compact('contact'));
    }
   
}
