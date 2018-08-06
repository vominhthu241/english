<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Test;
use App\TestSkill;

class ContentController extends Controller
{
    //
    public function index() {
        $content = Content::paginate(15);
        return view('admin.page.content.list',['content'=>$content]);
    }

    public function create() {
        $test = Test::all();
        $testskill = TestSkill::all();
        return view('admin.page.content.add',['test'=>$test, 'testskill'=>$testskill]);
    }

    public function postaddContent(Request $request) {
        $this->validate($request, [
            'content' => 'required',
        ], [
            'content.required' => 'Vui lòng nhập Content'
        ]);
        $content = new Content;
        if (!empty($request->images)) {
            $fileExtension = !empty($request->images) ? $request->file('images')->getClientOriginalExtension() : '';
            $fileName = time() . "_" . rand(0, 9999999) . "." . $fileExtension;
            $uploadPath = public_path('/images'); // Thư mục upload
            $request->images->move($uploadPath, $fileName);
            $content->fileimage = $fileName;
        }
        //upload mp3
        if (!empty($request->mp3)) {
            $mp3Extension = !empty($request->mp3) ? $request->file('mp3')->getClientOriginalExtension() : '';
            $mp3Name = time() . "_" . rand(0, 9999999) . "." . $mp3Extension;
            $uploadPath = public_path('/mp3'); // Thư mục upload
            $request->mp3->move($uploadPath, $mp3Name);
            $content->filemedia = $mp3Name;
        }
        $content->content = $request->content;
        $content->test_id = $request->test_id;
        $content->save();
        return redirect()->back()->with('message','Add success!!');
    }

    public function editContent($id) {
        $content = Content::find($id);
        return view('admin.page.content.edit', ['content'=>$content]);
    }

    public function posteditContent(Request $request) {
         $this->validate($request, [
                'content' => 'required',
            ], [
                'content.required' => 'Vui lòng nhập Content'
            ]);
        $content = Content::find($request->id);
        if (!empty($request->images)) {
            $fileExtension = !empty($request->images) ? $request->file('images')->getClientOriginalExtension() : '';
            $fileName = time() . "_" . rand(0, 9999999) . "." . $fileExtension;
            $uploadPath = public_path('/images'); // Thư mục upload
            $request->images->move($uploadPath, $fileName);
            $content->fileimage = $fileName;
        }
        //upload mp3
        if (!empty($request->mp3)) {
            $mp3Extension = !empty($request->mp3) ? $request->file('mp3')->getClientOriginalExtension() : '';
            $mp3Name = time() . "_" . rand(0, 9999999) . "." . $mp3Extension;
            $uploadPath = public_path('/mp3'); // Thư mục upload
            $request->mp3->move($uploadPath, $mp3Name);
            $content->filemedia = $mp3Name;
        }
        $content->content = $request->content;
        $content->save();
        return redirect()->back()->with('message','Edit success!!');
    }

    public function destroy(Request $request)
    {
        Content::find($request->id)->delete();
        return json_encode('Deleted successful!!');
    }
}
