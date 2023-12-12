<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class BlogsController extends Controller
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
        $blogs = Blogs::orderBy('sort_order','asc')->paginate(15);

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|max:1024',
            'description' => 'required',
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
            'title'=> $request->title,
            'slug'=> $cann,
            'sort_order'=> $request->sort_order,
            'description'=> $request->description,
            'status' => $request->status,
            'blog_date' => date('Y-m-d',strtotime($request->blog_date)),
        ];

        $blog = Blogs::create($data);

        $image = uploadImage($request, 'image', 'blog');

        $blog->image = $image;
        $blog->save();

        return redirect()->route('admin.blogs.index')->with([
            'status' => "Blog Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogs $banner)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogs $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blogs $blog)
    {
        $request->validate([
            'image' => 'nullable|max:2048',
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
       // $blog->page = $request->page;
        $blog->title = $request->title;
        $blog->slug = $cann;
        $blog->description = $request->description;
        $blog->sort_order = ($request->sort_order != '') ? $request->sort_order : 0;
        $blog->status = $request->status;
        $blog->blog_date = date('Y-m-d',strtotime($request->blog_date));

        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'blog');
            deleteImage($blog->image);
            $blog->image = $image;
        }

        $blog->save();

        return redirect()->route('admin.blogs.index')->with([
            'status' => "Blogs details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogs $blog)
    {
        $img = $blog->image;
        if ($blog->delete()) {
            deleteImage($img);
        }
        return redirect()->route('admin.blogs.index')->with([
            'status' => "Blogs Deleted"
        ]);
    }
}
