<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class SliderController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::orderBy('sort_order','asc')->paginate(15);

        return view('admin.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
          //  'cover_image' => 'required|max:1024',
            'title' => 'required',
            'description' => 'required',
          //  'video_link' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB',
            'cover_image.uploaded' => 'File size should be less than 1 MB'
        ]);
        $data = [
            'title'=> $request->title,
            'description'=> $request->description,
            'video_link'=> $request->video_link,
            'sort_order' => ($request->sort_order != '') ? $request->sort_order : 0,
            'status' => $request->status,
        ];

        $slider = Slider::create($data);

        $image = uploadImage($request, 'image', 'slider');
        $cover_image = uploadImage($request, 'cover_image', 'slider');

        $slider->image = $image;
        $slider->cover_image = $cover_image;
        $slider->save();

        return redirect()->route('admin.slider.index')->with([
            'status' => "Slider Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image' => 'nullable|max:1024',
            'title' => 'required',
            'video_link' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);

        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->video_link = $request->video_link;
        $slider->sort_order = ($request->sort_order != '') ? $request->sort_order : 0;
        $slider->status = $request->status;

        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'slider');
            deleteImage($slider->image);
            $slider->image = $image;
        }
        if ($request->hasFile('cover_image')) {
            $cover_image = uploadImage($request, 'cover_image', 'slider');
            deleteImage($slider->cover_image);
            $slider->cover_image = $cover_image;
        }
        $slider->save();

        return redirect()->route('admin.slider.index')->with([
            'status' => "Slider details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $img = $slider->image;
        if ($slider->delete()) {
            deleteImage($img);
        }
        return redirect()->route('admin.slider.index')->with([
            'status' => "Slider Deleted"
        ]);
    }
}
