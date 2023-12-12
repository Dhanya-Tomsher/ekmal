<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\Serviceslist; 
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class ServicesController extends Controller
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
        $services = Services::orderBy('sort_order','asc')->paginate(15);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|max:1024',
            'name' => 'required',
            'description' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);
            $canon_name = strtolower($request->name);
            $canonical_name = str_replace(' ', '-', $canon_name); // Replaces all spaces with hyphens.
            $canonical_name = preg_replace('/[^A-Za-z0-9\-]/', '', $canonical_name); // Removes special chars.
            $cann = preg_replace('/-+/', '-', $canonical_name);
        $data = [
            'name'=> $request->name,
            'slug'=> $cann,
            'description'=> $request->description,
            'sort_order' => ($request->sort_order != '') ? $request->sort_order : 0,
            'status' => $request->status,
        ];

        $services = Services::create($data);

        $image = uploadImage($request, 'image', 'service');
        $detailspage_image = uploadImage($request, 'detailspage_image', 'service');

        $services->image = $image;
        $services->detailspage_image = $detailspage_image;
        $services->save();
        $reportId = $services->id;

        $s1_datas = $subcon_datas = [];
        if ($request->s1_data && $reportId) {
            foreach ($request->s1_data as $s1_data) {
               
                    $s1_datas[] = [
                        'service_id' => $reportId,
                        'name' => $s1_data['s1_name'], 
                        'description' => $s1_data['s1_description'],
                        'position' => $s1_data['s1_position'],
                        'sort_order' => $s1_data['s1_sort_order']
                    ];
                
            }
            if(!empty($s1_datas)){
                Serviceslist::insert($s1_datas);
            }
        }

        
        return redirect()->route('admin.services.index')->with([
            'status' => "Service Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $services)
    {
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $service)
    { 
        $s1_data = [];
        // $s1_sub = Serviceslist::where('service_id', $service->id)->get();
        $s1_sub = Services::with(['service_details'])->find($service->id);
        if(!empty($s1_sub->service_details)){
            foreach ($s1_sub->service_details as $ss) {
                $arr = [];            
                
                    $arr['name'] = $ss->name;
                    $arr['description'] = $ss->description;
                    $arr['position'] = $ss->position;
                    $arr['sort_order'] = $ss->sort_order;
                    $s1_data[] = $arr;
            }
        }

        $s1Data = json_encode($s1_data);
        return view('admin.services.edit', compact('service','s1Data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Services $service)
    {
        $request->validate([
            'image' => 'nullable|max:1024',
            'detailspage_image'=> 'nullable|max:1024',
            'name' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB',
            'detailspage_image.uploaded' => 'File size should be less than 1 MB'
        ]);
        $canon_name = strtolower($request->name);
        $canonical_name = str_replace(' ', '-', $canon_name); // Replaces all spaces with hyphens.
        $canonical_name = preg_replace('/[^A-Za-z0-9\-]/', '', $canonical_name); // Removes special chars.
        $cann = preg_replace('/-+/', '-', $canonical_name);
        $service->slug = $cann;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->sort_order = ($request->sort_order != '') ? $request->sort_order : 0;
        $service->status = $request->status;

        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'service');
            deleteImage($service->image);
            $service->image = $image;
        }
        if ($request->hasFile('detailspage_image')) {
            $detailspage_image = uploadImage($request, 'detailspage_image', 'service');
            deleteImage($service->detailspage_image);
            $service->detailspage_image = $detailspage_image;
        }
        $service->save();
        $id = $service->id;

        Serviceslist::where('service_id', $id)->delete();

        if($request->has('s1_data')){
            $list = $request->s1_data;
            $listData = array();
            foreach($list as $add){
                if($add['name'] != ''){
                    $listData[] = [
                        'service_id' => $id,
                        'name' => $add['name'], 
                        'description' => $add['description'],
                        'position' => $add['position'],
                        'sort_order' => $add['sort_order']
                    ];
                }
            }
            if(!empty($listData)){
                Serviceslist::insert($listData);
            }
        }

        return redirect()->route('admin.services.index')->with([
            'status' => "Services details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $service)
    {
        $img = $service->image;
        $dimg = $service->detailspage_image;
        if ($service->delete()) {
            deleteImage($img);
            deleteImage($dimg);
        }

        return redirect()->route('admin.services.index')->with([
            'status' => "Service Deleted"
        ]);
    }
}
