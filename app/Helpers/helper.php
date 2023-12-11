<?php

use App\Models\Division;
use App\Models\Brand;
use App\Models\Blog;
use App\Models\GeneralSettings;
use App\Models\Services;
use App\Models\Pages;
use App\Models\Clients;
use App\Models\Address;
use App\Models\Product\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function adminAsset($path)
{
    return asset('adminassets/' . $path);
}

function assets($path)
{
    return asset('assets/' . $path);
}


function cleanFileName($file_name_str)
{
    $file_name_str = str_replace(' ', '-', $file_name_str);
    // Removes special chars. 
    $file_name_str = preg_replace('/[^A-Za-z0-9.\-\_]/', '', $file_name_str);
    // Replaces multiple hyphens with single one. 
    $file_name_str = preg_replace('/-+/', '-', $file_name_str);
    return $file_name_str;
}


/**
 * Image Upload Helper
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  string $input
 * @param  string $path
 * @param  boolean $uniqueName
 * @return \Illuminate\Http\Response
 */
function uploadImage(Request $request, $input, $path, $uniqueName = true)
{
    if ($request->hasFile($input)) {
        $uploadedFile = $request->file($input);
        $filename =   time() . $uploadedFile->getClientOriginalName();
        if (!$uniqueName) {
            $filename = $uploadedFile->getClientOriginalName();
        }

        $name = Storage::disk('public')->putFileAs(
            $path,
            $uploadedFile,
            $filename
        );

        return Storage::url($name);
    }
    return null;
}


function deleteImage($path)
{
    $fileName = 'public' . Str::remove('/storage', $path);
    if (Storage::exists($fileName)) {
        Storage::delete($fileName);
    }
}

function menuDivisions()
{
    return Division::where('status', 1)->get();
}

function getBrands()
{
    return Brand::where('status', 1)->orderBy('sort_order','ASC')->get();
}

function getRecentBlogs()
{
    return Blog::where('status', 1)->orderBy('blog_date','DESC')->limit(4)->get();
}

function getSecondBlog()
{
    return Blog::where('status', 1)->orderBy('blog_date','DESC')->skip(1)->take(1)->get();
}

function getThirdBlog()
{
    return Blog::where('status', 1)->orderBy('blog_date','DESC')->skip(2)->take(1)->get();
}

function getForthBlog()
{
    return Blog::where('status', 1)->orderBy('blog_date','DESC')->skip(3)->take(1)->get();
}

function menuCategory()
{
    return ProductCategory::where([
        'status' => 1,
        'parent_id' => 0,
    ])->get();
}

function getDirection()
{
    if (getActiveLanguage() == 'ar') {
        return 'rtl';
    }
    return 'ltr';
}

function getActiveLanguage()
{
    if (Session::exists('locale')) {
        return Session::get('locale');
    }
    return 'en';
}

function getGeneralSettings(){
    return GeneralSettings::firstOrFail()->toArray();
}

function getSettings(){
    $sett =  GeneralSettings::firstOrFail()->first();
    return $sett;
}

function getServices(){
    return Services::where('status',1)->orderBy('sort_order','asc')->get();
}

function getPageData($page){
    return Pages::with(['seo'])->where('page_name', $page)->first();
}

function getClients(){
    return Clients::where('status',1)->orderBy('sort_order','asc')->get();
}


function getFirstAddress(){
    return Address::orderBy('id', 'ASC')->limit(1)->get();
}

function getTwoThreeAddress(){
    return Address::orderBy('id', 'ASC')->skip(1)->take(2)->get();
}

function getFirstTwoAddress(){
    return Address::orderBy('id', 'ASC')->limit(2)->get();
}

function  getThreeFourAddress(){
    return Address::orderBy('id', 'ASC')->skip(2)->take(2)->get();
}