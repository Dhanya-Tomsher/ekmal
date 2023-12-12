<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dynamiccontents;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class DynamiccontentsController extends Controller
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
        $dynamiccontents = Dynamiccontents::orderBy('sort_order','asc')->paginate(15);
        return view('admin.dynamiccontents.index', compact('dynamiccontents'));
    }

    public function create()
    {
        return view('admin.dynamiccontents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
         //   'image' => 'required|max:1024',
            'title' => 'required',
          //  'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);
        $data = [
            'page'=> $request->page,
            'title'=> $request->title,
            'description'=> $request->description,
            'video_link'=> $request->videolink,
            'link'=> $request->link,
            'status' => $request->status,
        ];

        $dynamiccontent = Dynamiccontents::create($data);

        $image = uploadImage($request, 'image', 'dynamiccontent');
        $coverimage = uploadImage($request, 'cover_image', 'dynamiccontent');
        $dynamiccontent->image = $image;
        $dynamiccontent->cover_image = $coverimage;
        $dynamiccontent->save();

        return redirect()->route('admin.dynamiccontents.index')->with([
            'status' => "Dynamiccontents Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dynamiccontents $dynamiccontent)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dynamiccontents $dynamiccontent)
    {
        return view('admin.dynamiccontents.edit', compact('dynamiccontent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dynamiccontents $dynamiccontent)
    {
        $request->validate([
          //  'image' => 'nullable|max:1024',
            'title' => 'required',
           // 'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);

        $dynamiccontent->page = $request->page;
        $dynamiccontent->title = $request->title;
        $dynamiccontent->description = $request->description;
        $dynamiccontent->link = $request->link;
        $dynamiccontent->video_link = $request->videolink;
        $dynamiccontent->status = $request->status;

        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'dynamiccontent');
            deleteImage($dynamiccontent->image);
            $dynamiccontent->image = $image;
        }
        if ($request->hasFile('coverimage')) {
            $coverimage = uploadImage($request, 'coverimage', 'dynamiccontent');
            deleteImage($dynamiccontent->coverimage);
            $dynamiccontent->coverimage = $coverimage;
        }

        $dynamiccontent->save();

        return redirect()->route('admin.dynamiccontents.index')->with([
            'status' => "Dynamiccontents details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dynamiccontents $dynamiccontent)
    {
        $img = $dynamiccontent->image;
        if ($dynamiccontent->delete()) {
            deleteImage($img);
        }
        $cimg = $dynamiccontent->coverimage;
        if ($dynamiccontent->delete()) {
            deleteImage($cimg);
        }
        return redirect()->route('admin.dynamiccontents.index')->with([
            'status' => "Dynamiccontent Deleted"
        ]);
    }
   
}
