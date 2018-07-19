<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Test;
use App\Image;

class ContentController extends Controller
{
    //
    public function index() {
        $content = Content::all();
        return view('admin.page.content.list',['content'=>$content]);
    }

    public function create() {
        $test = Test::all();
        return view('admin.page.content.add',['test'=>$test]);
    }

    public function postaddContent(Request $request) {
         $this->validate($request, [
                'name' => 'required',
                // 'images' => 'required',
                'content' => 'required',
            ], [
                'name.required' => 'Vui lòng nhập Content Name',
                // 'images.required' => 'Vui lòng chọn file upload',
                'content.required' => 'Vui lòng nhập Content'
            ]);
        $content = new Content;
        $content->name = $request->name;
        $content->time = $request->times;
        $content->content = $request->content;
        $content->test_id = $request->test_id;
        $content->save();
        // if($content->save()){
        //     $fileExtension = $request->file('images')->getClientOriginalExtension(); 
        //     $fileName = time() . "_" . rand(0,9999999) . "." . $fileExtension;
        //     $uploadPath = public_path('/images'); // Thư mục upload
        //     $request->images->move($uploadPath, $fileName);
        //     $content_id = $content->id;
        //     $image = new Image;
        //     $image->image = $fileName;
        //     $image->content_id = $content_id;
        //     $image->save();
        //     return redirect()->back()->with('message','Add success!!');
        // }else{
        //     return redirect()->back()->with('message','Add error!!');
        // }

    }

    public function editContent($id) {
        $content = Content::find($id);
        return view('admin.page.content.edit', ['content'=>$content]);
    }

    public function posteditContent(Request $request) {
         $this->validate($request, [
                'name' => 'required',
                'content' => 'required',
            ], [
                'name.required' => 'Vui lòng nhập Content Name',
                'content.required' => 'Vui lòng nhập Content'
            ]);

        $content = Content::find($request->id);
        $content->name = $request->name;
        $content->time = $request->times;
        $content->content = $request->content;
        $content->save();
        // if($content->save() && $request->file('images')){
        //     $fileExtension = $request->file('images')->getClientOriginalExtension(); 
        //     $fileName = time() . "_" . rand(0,9999999) . "." . $fileExtension;
        //     $uploadPath = public_path('/images'); // Thư mục upload
        //     $request->images->move($uploadPath, $fileName);
        //     $content_id = $content->id;
        //     $image = new Image;
        //     $image->image = $fileName;
        //     $image->content_id = $request->id;
        //     $image->save();
        // }

        return redirect()->back()->with('message','Edit success!!');
    }
}
