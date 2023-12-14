<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\Serviceslist;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class ServiceslistController extends Controller
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
        $serviceslists = Serviceslist::orderBy('sort_order','asc')->paginate(15);

        return view('admin.serviceslist.index', compact('serviceslists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.serviceslist.create');
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
            'description' => $request->description,
            'position' => $request->position,
            'sort_order' => ($request->sort_order != '') ? $request->sort_order : 0,
            'status' => $request->status,
        ];

        $serviceslists = Serviceslist::create($data);
        $serviceslists->save();

        return redirect()->route('admin.serviceslist.index')->with([
            'status' => "Serviceslist Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Serviceslist $serviceslists)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Serviceslist $serviceslist)
    {
        return view('admin.serviceslist.edit', compact('serviceslist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Serviceslist $serviceslists)
    {
        $request->validate([
            'name' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],);

        $serviceslists->name = $request->name;
        $serviceslists->description = $request->description;
        $serviceslists->position = $request->position;
        $serviceslists->sort_order = ($request->sort_order != '') ? $request->sort_order : 0;
        $serviceslists->status = $request->status;


        $serviceslists->save();

        return redirect()->route('admin.serviceslist.index')->with([
            'status' => "Serviceslists details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Serviceslist $serviceslists)
    {
        
        return redirect()->route('admin.serviceslist.index')->with([
            'status' => "Serviceslist Deleted"
        ]);
    }
}
