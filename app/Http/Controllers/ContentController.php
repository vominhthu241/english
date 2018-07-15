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
        $content = new Content;
        // $fileImage= $request->images;
        // $fileImageName= $fileImage->getClientOriginalName();
        // $fileImage->move('images/imgC',$fileImageName);
        $content->test_id = $request->test_id;
        $content->name = $request->name;
        $content->time = $request->times;
        $content->content = $request->content;
        $content->save();
        return redirect()->back()->with('message','Add success!!');
        // if($content->save()) {
        //     $content_id = $content->id;
        //     $image = new Image;
        //     $image->image = $fileImageName;
        //     $image->content_id = $content_id;
        //     $image->save();
        // }

    }

    public function editContent($id) {
        $content = Content::find($id);
        return view('admin.page.content.edit', ['content'=>$content]);
    }

    public function posteditContent(Request $request) {
        $content = Content::find($request->id);
        $content->name = $request->name;
        $content->time = $request->times;
        $content->content = $request->content;
        $content->save();
        return redirect()->back()->with('message','Edit success!!');
    }
}
