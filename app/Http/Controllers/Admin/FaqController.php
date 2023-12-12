<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class FaqController extends Controller
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
        $faq = Faq::orderBy('sort_order','asc')->paginate(15);

        return view('admin.faq.index', compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faq.create');
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

        $client = Faq::create($data);

        
        $client->save();

        return redirect()->route('admin.faq.index')->with([
            'status' => "Faq Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'title' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);

        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->sort_order = ($request->sort_order != '') ? $request->sort_order : 0;
        $faq->status = $request->status;

        

        $faq->save();

        return redirect()->route('admin.faq.index')->with([
            'status' => "Faq details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        
        if ($faq->delete()) {
           
        }
        return redirect()->route('admin.faq.index')->with([
            'status' => "Faq Deleted"
        ]);
    }
}
