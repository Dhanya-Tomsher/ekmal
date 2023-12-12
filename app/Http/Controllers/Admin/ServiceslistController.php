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
            'image' => 'required|max:1024',
            'name' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);
        $data = [
            'name'=> $request->name,
            'sort_order' => ($request->sort_order != '') ? $request->sort_order : 0,
            'status' => $request->status,
        ];

        $serviceslists = Serviceslist::create($data);

        $image = uploadImage($request, 'image', 'serviceslists');

        $serviceslists->image = $image;
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
    public function edit(Serviceslist $serviceslists)
    {
        return view('admin.serviceslist.edit', compact('serviceslists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Serviceslist $serviceslists)
    {
        $request->validate([
            'image' => 'nullable|max:1024',
            'name' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);

        $serviceslists->name = $request->name;
        $serviceslists->sort_order = ($request->sort_order != '') ? $request->sort_order : 0;
        $serviceslists->status = $request->status;

        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'serviceslists');
            deleteImage($serviceslists->image);
            $serviceslists->image = $image;
        }

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
        $img = $serviceslists->image;
        if ($serviceslists->delete()) {
            deleteImage($img);
        }
        return redirect()->route('admin.serviceslist.index')->with([
            'status' => "Serviceslist Deleted"
        ]);
    }
}
