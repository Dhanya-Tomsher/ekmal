<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class BannersController extends Controller
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
        $banners = Banners::orderBy('sort_order','asc')->paginate(15);

        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|max:2028',
            'page' => 'required',
            'title' => 'required',
           // 'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);
        $data = [
            'title'=> $request->title,
            'description'=> $request->description,
            'status' => $request->status,
        ];

        $banner = Banners::create($data);

        $image = uploadImage($request, 'image', 'banner');

        $banner->image = $image;
        $banner->save();

        return redirect()->route('admin.banners.index')->with([
            'status' => "Banner Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banners $banner)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banners $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banners $banner)
    {
        $request->validate([
            'image' => 'nullable|max:2028',
            'title' => 'required',
          //  'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);

        $banner->page = $request->page;
        $banner->title = $request->title;
        $banner->description = $request->description;
      //  $client->sort_order = ($request->sort_order != '') ? $request->sort_order : 0;
        $banner->status = $request->status;

        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'banner');
            deleteImage($banner->image);
            $banner->image = $image;
        }

        $banner->save();

        return redirect()->route('admin.banners.index')->with([
            'status' => "Banner details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banners $banner)
    {
        $img = $banner->image;
        if ($banner->delete()) {
            deleteImage($img);
        }
        return redirect()->route('admin.banners.index')->with([
            'status' => "Banner Deleted"
        ]);
    }
}
