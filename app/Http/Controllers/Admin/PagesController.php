<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\PageTranslations;
use App\Models\PageSeos;
use App\Models\GeneralSettings;
use App\Models\HeritageLists;
use App\Models\Contact;
use App\Models\Address;
use App\Models\CareerApplications;
use App\Models\Usercourses;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:enquiries', ['only' => ['enquiries']]);
        $this->middleware('permission:careersapplication', ['only' => ['careersapplication']]);
        $this->middleware('permission:general_settings', ['only' => ['generalSettings']]);
        $this->middleware(function ($request, $next) {
            if(Auth()->user()->user_type === 1){
                return $next($request);
            }else{
                return redirect()->route('account');
            }
        });
    }

    
    public function homePage()
    {
        
    }

    public function generalSettings(Request $request){
        $data = getGeneralSettings();
        return view('admin.pages.settings',compact('data'));
    }

    public function storeSettings(Request $request)
    {
        $request->validate([
            'facebook' => 'required',
            'instagram' => 'required'
        ],[
            '*.required' => 'This field is required.'
        ]);

        $data = $request->all();
        
        unset($data['_token']);
        $set = GeneralSettings::find(1);
        $set->facebook = $request->facebook;
        $set->instagram = $request->instagram;
        $set->save();
        
        return redirect()->back()->with(['status' => "Details updated"]);
    }

    
    public function enquiries(){
        $query = Contact::latest();
        $contact = $query->paginate(10);

        return view('admin.contact.index', compact('contact'));
    }
    public function careersapplication(){
        $query = CareerApplications::latest();
        $contact = $query->paginate(10);

        return view('admin.careerapplications.index', compact('contact'));
    }
    public function usercourses(){
        $query = Usercourses::latest();
        $contact = $query->paginate(10);

        return view('admin.usercourses.index', compact('contact'));
    }
}
