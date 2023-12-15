<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Course;
use App\Models\Blogs;
use App\Models\Faq;
use App\Models\User;
use App\Models\Usercourses;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use App\Models\Pages;
use App\Models\PageTranslations;
use App\Models\PageSeos;
use App\Models\HomeBanner;
use App\Models\Careers;
use App\Models\HeritageLists;
use App\Models\CareerApplications;
use App\Models\Branches;
use App\Models\Services;
use App\Models\Contact;
use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Mail\ContactEnquiry;
use App\Models\Contactdetails;
use App\Models\Dynamiccontents;
use App\Models\Serviceslist;
use Illuminate\Support\Facades\URL;
#use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Storage;
use Validator;
use Mail;
use DB;
use Hash;
#use Auth;

class FrontendController extends Controller
{

    public function loadSEO($model)
    {
        // SEOTools::setTitle($model->page_title);
        // OpenGraph::setTitle($model->page_title);
        // TwitterCard::setTitle($model->page_title);

        if (isset($model->seo[0])) {
            // SEOMeta::setTitle($model->seo[0]->seo_title ?? $model->page_title);
            // SEOMeta::setDescription($model->seo[0]->seo_description);
            // SEOMeta::addKeyword($model->seo[0]->keywords);

            // OpenGraph::setTitle($model->seo[0]->og_title);
            // OpenGraph::setDescription($model->seo[0]->og_description);
            // OpenGraph::setUrl(URL::full());
            // OpenGraph::addProperty('locale', 'en_US');
           
            // JsonLd::setTitle($model->seo[0]->seo_title);
            // JsonLd::setDescription($model->seo[0]->seo_description);
            // JsonLd::setType('Page');

            // TwitterCard::setTitle($model->seo[0]->twitter_title);
            // TwitterCard::setSite("@goaerials");
            // TwitterCard::setDescription($model->seo[0]->twitter_description);

            // SEOTools::jsonLd()->addImage(URL::to(asset('assets/img/favicon.svg')));
        }
    }

    public function loadDynamicSEO($model)
    {
        // SEOTools::setTitle($model->title);
        // OpenGraph::setTitle($model->title);
        // TwitterCard::setTitle($model->title);

        // SEOMeta::setTitle($model->seo_title ?? $model->title);
        // SEOMeta::setDescription($model->seo_description);
        // SEOMeta::addKeyword($model->keywords);

        // OpenGraph::setTitle($model->og_title);
        // OpenGraph::setDescription($model->og_description);
        // OpenGraph::setUrl(URL::full());
        // OpenGraph::addProperty('locale', 'en_US');
           
        // JsonLd::setTitle($model->seo_title);
        // JsonLd::setDescription($model->seo_description);
        // JsonLd::setType('Page');

        // TwitterCard::setTitle($model->twitter_title);
        // TwitterCard::setSite("@goaerials");
        // TwitterCard::setDescription($model->twitter_description);

        // SEOTools::jsonLd()->addImage(URL::to(asset('assets/img/favicon.svg')));
    }
    public function home()
    {
      //  $banners = HomeBanner::where('status',1)->orderBy('sort_order', 'ASC')->get();
     //   return view('frontend.home',compact('page','banners'));
        $sliders = Slider::find(1);
        $dyn1 = Dynamiccontents::find(1);
        $dyn2 = Dynamiccontents::find(2);
        $serv = Services::where('status', '=', 1)->get();
        $dyn3 = Dynamiccontents::find(3);
        $dyn4 = Dynamiccontents::find(4);
        $dyn5 = Dynamiccontents::find(5);
        $dyn6 = Dynamiccontents::find(6);
        $cou1 = Course::where('home_display_sort_order', '=', 1)->get();
        $cou2 = Course::where('home_display_sort_order', '=', 2)->get();
        $cou3 = Course::where('home_display_sort_order', '=', 3)->get();
        $cou4 = Course::where('home_display_sort_order', '=', 4)->get();
        $blog = Blogs::where('status', '=', 1)->orderBy('sort_order', 'ASC')->get();
        $allc = Course::where('status', '=', 1)->limit(2)->get();
        $faq = Faq::where('status', '=', 1)->orderBy('sort_order', 'ASC')->get();
        return view('frontend.index',compact('sliders','dyn1','dyn2','serv','dyn3','dyn4','dyn5','dyn6','cou1','cou2','cou3','cou4','blog','allc','faq'));  
    }
    public function courses()
    {
        $banner = Banners::find(4);
        $cou1 = Course::where('status', '=', 1)->orderBy('sort_order', 'ASC')->get();
        $dyn8 = Dynamiccontents::find(8);
        $dyn9 = Dynamiccontents::find(9);
        return view('frontend.courses',compact('banner','cou1','dyn8','dyn9'));   
    }
    public function courseDetails(Request $request)
    {
        $slug = $request->slug;
        $course = Course::where('status',1)->where('slug',$slug)->first();
        return view('frontend.course_details', compact('course'));
    }
    public function courseApply(Request $request)
    {
        $slug = $request->slug;
        $course = Course::where('status',1)->where('slug',$slug)->first();
        $user = Auth()->user();
        $usercourse                 = new Usercourses();
        $usercourse->user_id        = $user->id;
        $usercourse->course_id      = $course->id;
        $usercourse->status         = 1;
        $usercourse->save(); 
        return view('frontend.account');
    }
    public function searchBlog(Request $request){
        $search = '';
        if($request->has('keyword')){
            $search = $request->keyword;
        }

        $query = Blogs::where('status',1);

        if($search != ''){
            $query->Where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%"); 
                });
        }
        
        $blogs = $query->paginate(15);
        return view('frontend.search-results',compact('blogs'));
    }
    public function contact()
    {
        $banner = Banners::find(11);
        $contact = Contactdetails::where('status', '=', 1)->orderBy('sort_order', 'ASC')->get();
        return view('frontend.contact',compact('banner','contact')); 
    }
    public function about()
    {
        $banner = Banners::find(6);
        $dyn9 = Dynamiccontents::find(9);
        $dyn13 = Dynamiccontents::find(13);
        $dyn14 = Dynamiccontents::find(14);
        $dyn15 = Dynamiccontents::find(15);
        $dyn16 = Dynamiccontents::find(16);
        $dyn17 = Dynamiccontents::find(17);
        $dyn18 = Dynamiccontents::find(18);
        $dyn19 = Dynamiccontents::find(19);
        $dyn20 = Dynamiccontents::find(20);
        $dyn21 = Dynamiccontents::find(21);
        $dyn22 = Dynamiccontents::find(22);
        $dyn23 = Dynamiccontents::find(23);
        return view('frontend.about',compact('banner','dyn13','dyn14','dyn15','dyn16','dyn17','dyn18','dyn9','dyn19','dyn20','dyn21','dyn22','dyn23')); 
    }
    public function careers()
    {
        $banner = Banners::find(5);
        $dyn10 = Dynamiccontents::find(10);
        $dyn11 = Dynamiccontents::find(11);
        $dyn12 = Dynamiccontents::find(12);
        $carr = Careers::where('status', '=', 1)->get();
        return view('frontend.careers',compact('banner','dyn10','dyn11','carr','dyn12')); 
    }
    public function careersApply()
    {$banner = Banners::find(5);
        return view('frontend.careers-apply',compact('banner')); 
    }
    public function storeCareer(Request $request){
      /*  $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'description' => 'required',
            'resume' => 'required|max:500'
        ],[
            '*.required' => 'This field is required.',
            'resume.max' => "Maximum file size to upload is 500 KB.",
        ]);
        if ($validator->fails()) {
            return redirect(url()->previous() .'#job-application')->withErrors($validator)->withInput()->with([
                'error' => "Please check the error messages"
            ]);
        }
*/
        $con = new CareerApplications;
        $con->name = $request->name;
        $con->email = $request->email;
        $con->phone_number = $request->phone;
        $con->description = $request->description;
        
        if ($request->hasFile('resume')) {
            $resume = uploadImage($request, 'resume', 'resume');
            $con->resume = $resume;
        }
        $con->save();
      //  $filePath = public_path($resume);

        //Mail::to(env('MAIL_ADMIN'))->queue(new CareerEnquiry($con,$filePath));

        return redirect(url()->previous() .'#job-application')->with([
            'status' => "Thank you for getting in touch. Our team will contact you shortly."
        ]);
   }
    public function faq()
    {
        $banner = Banners::find(7);
        $faq = Faq::where('status', '=', 1)->orderBy('sort_order', 'ASC')->get();
        return view('frontend.faq',compact('banner','faq'));
    }
    public function terms()
    {
        $banner = Banners::find(8);
        $dyn24 = Dynamiccontents::find(24);
        return view('frontend.terms',compact('banner','dyn24')); 
    }
    public function privacy()
    {
        $banner = Banners::find(9);
        $dyn25 = Dynamiccontents::find(25);
        return view('frontend.privacy',compact('banner','dyn25')); 
    }
    public function blogs()
    {
        $dyn4 = Dynamiccontents::find(4);
        $dyn5 = Dynamiccontents::find(5);
        $dyn6 = Dynamiccontents::find(6);
        $dyn7 = Dynamiccontents::find(7);
        $banner = Banners::where('page', 'insights')->get();
        $faq = Faq::where('status', '=', 1)->orderBy('sort_order', 'ASC')->get();
        $blog = Blogs::where('status', '=', 1)->orderBy('sort_order', 'ASC')->get();
        return view('frontend.blogs',compact('banner','faq','blog','dyn4','dyn5','dyn6','dyn7')); 
    }
    public function blogDetails(Request $request)
    {
        $slug = $request->slug;
        $blog = Blogs::where('status',1)->where('slug',$slug)->first();
        return view('frontend.blog_details', compact('blog'));
    }    
    
    
    public function storeRegister(Request $request){
        $con                = new User();
        $con->email         = $request->email;
        $con->phone_number  = $request->phone;
        $con->name          = $request->name;
        $con->password      = Hash::make($request->password);
        $con->user_type     = 0;
        $con->status        = 1;
        $con->save();
        $user = Auth()->user();
         $banner = Banners::find(11);
        return view('frontend.account',compact('banner'));
    }

    public function storeRegisterupdate(Request $request){
        $con                = Blogs::where('id',$request)->where('slug',$slug)->first();
        $con->email         = $request->email;
        $con->phone_number  = $request->phone;
        $con->name          = $request->name;
        $con->password      = Hash::make($request->password);
        $con->user_type     = 0;
        $con->status        = 1;
        $con->save();
        $user = Auth()->user();
         $banner = Banners::find(11);
        return view('frontend.account',compact('banner'));
    }
    public function services()
    {
        $slider = Slider::find(3);
        $serv = Services::where('status', '=', 1)->orderBy('sort_order', 'ASC')->get(); 
        $dyn9 = Dynamiccontents::find(9);        
        return view('frontend.services', compact('slider','serv','dyn9'));
    }
    public function serviceDetails(Request $request)
    {
        $slug = $request->slug;
        $banner = Banners::find(10);
        $serv = Services::where('status', '=', 1)->get();
        $service = Services::where('status',1)->where('slug',$slug)->first();
        $servicelisttop = Serviceslist::where('service_id', '=', $service->id)->where('position', '=', 1)->where('status', '=', 1)->get();
        $servicelistbottom = Serviceslist::where('service_id', '=', $service->id)->where('position', '=', 2)->where('status', '=', 1)->get();
        return view('frontend.service_details', compact('service','banner','serv','servicelisttop','servicelistbottom'));
    }
    public function storeContact(Request $request){
        $con                = new Contact();
        $con->email         = $request->email;
        $con->name          = $request->name;
        $con->subject       = $request->subject;
        $con->phone_number  = $request->phone;
        $con->message       = $request->message;
        $con->save();
        return redirect()->back()->with('status', '<span style="color: #00a659;font-weight: 700;">Your message has been sent Successfully.</span>');
      // Mail::to(env('MAIL_ADMIN'))->queue(new ContactEnquiry($con));
       // $banner = Banners::find(11);
        //$contact = Contactdetails::where('status', '=', 1)->orderBy('sort_order', 'ASC')->get();
        //return view('frontend.contact',compact('banner','contact')); 
        // return redirect(url()->previous() .'#job-application')->with([
        //     'status' => "Thank you for getting in touch. Our team will contact you shortly."
        // ]);
    }
    public function storeServiceenquiry(Request $request){
        $con                = new Contact();
        $con->email         = $request->email;
        $con->service          = $request->service;
        $con->name          = $request->name;
        $con->subject       = $request->subject;
        $con->phone_number  = $request->phone;
        $con->message       = $request->message;
        $con->save();
        return redirect()->back()->with('status', '<span style="color: #00a659;font-weight: 700;">Your message has been sent Successfully.</span>');
      
    }

    public function account()
    {
        return view('frontend.account'); 
    }

}