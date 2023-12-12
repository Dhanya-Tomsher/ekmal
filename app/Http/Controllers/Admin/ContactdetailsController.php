<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contactdetails;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class ContactdetailsController extends Controller
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
        $contactdetails = Contactdetails::orderBy('sort_order','asc')->paginate(15);

        return view('admin.contactdetails.index', compact('contactdetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contactdetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],);
        $data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
            'sort_order' => ($request->sort_order != '') ? $request->sort_order : 0,
            'status' => $request->status,
        ];

        $contactdetails = Contactdetails::create($data);
        $contactdetails->save();

        return redirect()->route('admin.contactdetails.index')->with([
            'status' => "Contactdetails Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contactdetails $contactdetail)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contactdetails $contactdetail)
    {
        return view('admin.contactdetails.edit', compact('contactdetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contactdetails $contactdetail)
    {
        $request->validate([
            'name' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],);

        $contactdetail->name = $request->name;
        $contactdetail->email = $request->email;
        $contactdetail->phone = $request->phone;
        $contactdetail->address = $request->address;
        $contactdetail->sort_order = ($request->sort_order != '') ? $request->sort_order : 0;
        $contactdetail->status = $request->status;

        
        $contactdetail->save();

        return redirect()->route('admin.contactdetails.index')->with([
            'status' => "Contactdetails details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contactdetails $contactdetail)
    {
        return redirect()->route('admin.contactdetails.index')->with([
            'status' => "Contactdetails Deleted"
        ]);
    }
}
