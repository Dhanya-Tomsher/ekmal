<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mail;

class CustomAuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('frontend.userlogin');
    }  
   
    public function customLogin(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6',
        ]);
   
        $credentials = array('email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($credentials)) {
            if(Auth::user()->user_type == 0){
                if(Auth::user()->status == 0){
                    auth()->guard()->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return back()->withInput()->with('danger', 'Your account is Disabled. You are not allowed to access!');
                }else{
                    return redirect()->route('account');
                }
            }else{
                auth()->guard()->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->withInput()->with('danger', 'You are not allowed to access!');
            }
        }
  
        return redirect()
            ->back()
            ->withInput()
            ->with('danger', 'These credentials do not match our records.');
    }
    
    public function register()
    {
        return view('frontend.register'); 
    }
    public function postRegisterupdate(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:new_password',
        ],[
            '*.required' => 'This field is required'
        ]);
        $user = Auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->password;
        $user->password = $request->phone;
        $user->status = 1;

        $details = [
            'name' => $request->name,
            'subject' => 'Hi !',
            'body' => " <p> You have successfully updated your profile in ".env('APP_NAME')."</p><br>"
        ];

        Mail::to($request->email)->queue(new \App\Mail\SendMail($details));
        Auth::login($user);
        return redirect()->route('account');
    }
    public function postRegister(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:new_password',
        ],[
            '*.required' => 'This field is required'
        ]);
  
        $user = User::create([
            'user_type' => 0,
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->new_password),
            'phone_number' => $request->phone,
            'status' => 1,
        ]);

        $details = [
            'name' => $request->name,
            'subject' => 'Welcome to '.env('APP_NAME').'!',
            'body' => " <p> We are thrilled to welcome you to ".env('APP_NAME')."</p><br>
            <p>To start exploring, simply log in to your account using the credentials you provided during registration. If you have any questions or need assistance, please don't hesitate to reach out to our customer support team.</p><br>"
        ];

        Mail::to($request->email)->queue(new \App\Mail\SendMail($details));
        Auth::login($user);
        return redirect()->route('account');
    }

 
    public function editProfile()
    {
        $user = Auth()->user();
        return view('frontend.edit-profile', compact('user'));
    }
    public function signOut() {
        Session::flush();
        Auth::logout();

        return redirect()->route('signin');
    }
}