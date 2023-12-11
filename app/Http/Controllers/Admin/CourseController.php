<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Coursecategory;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class CourseController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Course::orderBy('sort_order','asc')->paginate(15);
        return view('admin.course.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Coursecategory::where('status', '=', 1)->get();
        return view('admin.course.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|max:1024',
            'title' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);
        $canon_name = strtolower($request->title);
            $canonical_name = str_replace(' ', '-', $canon_name); // Replaces all spaces with hyphens.
            $canonical_name = preg_replace('/[^A-Za-z0-9\-]/', '', $canonical_name); // Removes special chars.
            $cann = preg_replace('/-+/', '-', $canonical_name);
           
        $data = [
            'category_id'=> $request->category_id,
            'slug'=> $cann,
            'title'=> $request->title,
            'description'=> $request->description,
            'amount'=> $request->amount,
            'keyword'=> $request->keyword,
            'sort_order' => ($request->sort_order != '') ? $request->sort_order : 0,
            'home_display_sort_order' => ($request->home_display_sort_order != '') ? $request->home_display_sort_order : 0,
            'status' => $request->status,
        ];

        $course = Course::create($data);

        $image = uploadImage($request, 'image', 'course');

        $course->image = $image;
        $course->save();

        return redirect()->route('admin.course.index')->with([
            'status' => "Course Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $categories = Coursecategory::where('status', '=', 1)->get();
        return view('admin.course.edit', compact('course','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'image' => 'nullable|max:1024',
            'title' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);
        $canon_name = strtolower($request->title);
        $canonical_name = str_replace(' ', '-', $canon_name); // Replaces all spaces with hyphens.
        $canonical_name = preg_replace('/[^A-Za-z0-9\-]/', '', $canonical_name); // Removes special chars.
        $cann = preg_replace('/-+/', '-', $canonical_name);
        $course->slug = $cann;
        $course->category_id = $request->category_id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->amount = $request->amount;
        $course->keyword = $request->keyword;
        $course->sort_order = ($request->sort_order != '') ? $request->sort_order : 0;
        $course->home_display_sort_order = ($request->home_display_sort_order != '') ? $request->home_display_sort_order : 0;
        $course->status = $request->status;

        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'course');
            deleteImage($course->image);
            $course->image = $image;
        }

        $course->save();

        return redirect()->route('admin.course.index')->with([
            'status' => "Course details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $img = $course->image;
        if ($course->delete()) {
            deleteImage($img);
        }
        return redirect()->route('admin.course.index')->with([
            'status' => "Banner Deleted"
        ]);
    }
}
