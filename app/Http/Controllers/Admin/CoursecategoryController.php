<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coursecategory;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class CoursecategoryController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coursecategory = Coursecategory::orderBy('sort_order','asc')->paginate(15);

        return view('admin.coursecategory.index', compact('coursecategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coursecategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);
        $data = [
            'title'=> $request->title,
            'description'=> $request->description,
            'sort_order' => ($request->sort_order != '') ? $request->sort_order : 0,
            'status' => $request->status,
        ];

        $client = Coursecategory::create($data);

        
        $client->save();

        return redirect()->route('admin.coursecategory.index')->with([
            'status' => "Coursecategory Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coursecategory $coursecategory)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coursecategory $coursecategory)
    {
        return view('admin.coursecategory.edit', compact('coursecategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coursecategory $coursecategory)
    {
        $request->validate([
            'title' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);

        $coursecategory->title = $request->title;
        $coursecategory->description = $request->description;
        $coursecategory->sort_order = ($request->sort_order != '') ? $request->sort_order : 0;
        $coursecategory->status = $request->status;

        

        $coursecategory->save();

        return redirect()->route('admin.coursecategory.index')->with([
            'status' => "Coursecategory details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coursecategory $coursecategory)
    {
        
        if ($coursecategory->delete()) {
           
        }
        return redirect()->route('admin.coursecategory.index')->with([
            'status' => "Coursecategory Deleted"
        ]);
    }
}
