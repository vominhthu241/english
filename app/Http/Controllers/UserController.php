<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\TakeTest;
use App\Test;
use App\Testresult;
use App\Content;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::paginate(15);
        return view('admin.page.user.view',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.page.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateEmail = User::where('email', $request->email)->first();

        if (!$validateEmail) {

            $validate = Validator::make($request->all(), $this->rules());
            
            if ($validate->fails()) {
                \Session::flash('error_message', $validate->errors()->all());
                return redirect()->back()->with('thongbao','Success!!');
            }

            $user = new User();
            $user->name     = $request->name;
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
                \Session::flash('flash_message','Something went wrong, please create again!!!');
                return redirect()->back()->with('thongbao','Success!!');
            }
           
        } else {
            \Session::flash('flash_message','Email is existed!!!');
            return redirect()->back()->with('thongbao','failed!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        // $userTestedResults = $this->getUserAllTest($id);
        // dd($userTestedResults);
        return view('front.page.user.profile',[
            'user' => $user,
            // 'userTestedResults' => $userTestedResults,
        ]);
    }

    public function getUserAllTest($id) {
        // $takeTests = TakeTest::where('users_id',$id)->get();
        // $data = [];
        // foreach ($takeTests as $takeTest) {
        //     $data[] = [
        //         'taketest' => $takeTest,
        //         'testresult' => Testresult::where('id', $takeTest->testresult_id)->first(),
        //         'test'     => Test::where('id', $takeTest->test_id)->first(),
        //         'content'  => Content::where('id', $takeTest->content_id)->first(),
        //     ];
        // }
        // return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
    }

    public function getEdit($id,User $user){
        $user = User::find($id);
        return view('admin.page.user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        
        $user= User::find($request->id);
        if($user->id<>$request->id && $user->email ==$request->email){
            return redirect()->back()->with('flash_message','Trung email');
        }
        if($user->id <> $request->id){
            return redirect()->back()->with('flash_message','Tai khoan khong hop le');
        }
        if(!$user){
            return redirect()->back()->with('flash_message','Tai khoan khong ton tai');
        }
        // $validateEmail = User::where([
        //     ['id', '=', $request->id],
        //     ['email', '=', $request->email]&&['id', '<>', $request->id],
        // ])->get();
        // if (!$validateEmail) {

        //     $validate = Validator::make($request->all(), $this->rules());
            
        //     if ($validate->fails()) {
        //         \Session::flash('error_message', $validate->errors()->all());
        //         return redirect()->back()->with('message','Success!!');
        //     }

        // $userId = $request->id;

        // $user = User::find($userId);

        $user->name    = $request->name;
        $user->email   = $request->email;
        $user->phone   = $request->phone;
        $user->address = $request->address;
        $user->gender  = $request->gender;
        
        $check = $user->save(); 
        if ($check) {
            \Session::flash('flash_message','Edited successful!!!');
            return redirect()->back();
        } else {
            \Session::flash('error_message','Something went wrong, please create again!!!');
            return redirect()->back()->with('message','Success!!');
        }
        
        // } else {
        //     \Session::flash('flash_message','Email is existed!!!');
        //     return redirect()->back()->with('message','failed!!');
        // }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        User::find($request->id)->delete();
        return json_encode('Deleted successful!!');
    }

    public function rules(){
        return [
            'phone'    => 'min:10|max:11',
            'address'  => 'required',
            'name'     => 'required',
            'dob'      => 'required',
        ];
    }
}
