<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usercourse;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class ServicesController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Usercourse::orderBy('sort_order','asc')->paginate(15);

        return view('admin.usercourses.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usercourses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
            'status' => 'required',
        ],);
        $data = [
            'user_id'=> $request->user_id,
            'course_id'=> $request->course_id,
            'status' => $request->status,
        ];

        $services = Usercourse::create($data);
        $services->save();
        

        
        return redirect()->route('admin.usercourses.index')->with([
            'status' => "Service Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usercourse $services)
    {
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usercourse $service)
    { 
        
        return view('admin.usercourses.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usercourse $service)
    {
        $request->validate([
            'user_id' => 'nullable',
            'course_id'=> 'nullable',
            'status' => 'required',
        ],);
        $service->user_id = $request->user_id;
        $service->course_id = $request->course_id;
        $service->status = $request->status;

        
        $service->save();
        return redirect()->route('admin.usercourses.index')->with([
            'status' => "Services details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usercourse $services)
    {
            return redirect()->route('admin.usercourses.index')->with([
            'status' => "Service Deleted"
        ]);
    }
}
