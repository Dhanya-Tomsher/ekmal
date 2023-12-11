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
   /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $contact = Contact::orderBy('sort_order','asc')->paginate(15);
        return view('admin.contact.index', compact('contact'));
    }
   
}
