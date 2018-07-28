<?php

namespace App\Http\Controllers;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function toLogin() {
        return view('front.page.login');
    }
    /**
     * 
     */
    public function login(Request $request) {    
        if($user = Auth::attempt(['email'=>$request->email, 
                            'password'=>$request->password])) {
            $userInfo = User::where('email', $request->email)->first();
            $request->session()->put('users', $userInfo);
            if (session()->has('link')){
                $link = session('link');
                session()->forget('link');
                return redirect($link);
            }
                
            return redirect()->route('homepage');
        } else {
            \Session::flash('error_message', ['Login failed, wrong email or password!!!']);
            return redirect()->back();
        }
    }

    public function logout() {
        session()->forget('users');
        session()->flush();
        return redirect()->route('homepage');
    }

    public function register(Request $request){
        $validateEmail = User::where('email', $request->email)->first();

        if (!$validateEmail) {

            $validate = Validator::make($request->all(), $this->rules());
            
            if ($validate->fails()) {
                \Session::flash('error_message', $validate->errors()->all());
                return redirect()->back()->with('thongbao','Success!!');
            }

            $user = new User();
            $user->name     = $request->fullname;
            $user->email    = $request->email;
            $user->password = $request->password;
            $user->phone    = $request->phone;
            $user->address  = $request->address;
            $user->gender   = $request->gender;
            $user->dob      = $request->dob;
            $user->role     = 1;
            
            $check = $user->save(); 
            if ($check) {
                \Session::flash('flash_message','Added successful!!!');
                return redirect()->back()->with('thongbao','Success!!');
            } else {
                \Session::flash('error_message','Something went wrong, please register again!!!');
                return redirect()->back()->with('thongbao','Success!!');
            }
           
        } else {
            \Session::flash('flash_message','Email is existed!!!');
            return redirect()->back()->with('thongbao','failed!!');
        }
    }

    public function rules(){
        return [
            'phone'    => 'min:10|max:11',
            'address'  => 'required',
            'fullname' => 'required',
            'dob'      => 'required',
        ];
    }

    public function loginAdmin() {
        if(Auth::check()) {
            if(Auth::user()->role == 0) {
                return view('admin.layout.master');
            }
            else {
                return redirect()->back();
            }
        }
        else {
            return view('front.page.login');
        }
        
    }
}
