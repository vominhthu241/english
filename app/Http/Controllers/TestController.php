<?php

namespace App\Http\Controllers;

use App\Test;
use App\Image;
use App\Content;
use App\Question;
use App\Answer;
use App\Mp3;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $test = Test::latest();
        // return view('admin.layout.master');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.page.test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $next =0;
        $checkCorrect = true;
        $questions = $request->question;
        $correct = $request->correct;
        $answers = $request->answers;
        $error = array();

         if(empty($request->testname)){
                $error['testname'] = "Vui lòng nhập test name";  
            }

        if(empty($request->content)){
                $error['content'] = "Vui lòng nhập content";  
            }
            

        if ($request->testtype) {
            if($request->hasFile('images')==false && $request->testtype==='reading'){
                $error['files'] = "Vui lòng chọn file upload image";  
            }

            if($request->hasFile('mp3')==false && $request->testtype==='listening'){
                $error['files'] = "Vui lòng chọn file upload mp3";  
            }
        }

        for ($i=0;$i<count($questions);$i++){
            if($questions[$i]==NULL){
                $error['question'] = "Câu hỏi không được để trống";
                break;
            }
        }

        for ($i=0;$i<count($answers);$i++){
            if($answers[$i]==NULL){
                $error['answer'] = "Câu trả lời không được để trống";
                break;
            }
        }

        for ($i=0;$i<count($correct);$i++){
            if($correct[$i]==1){
                $checkCorrect = false;
            }
        }

        if($checkCorrect){
            $error['correct'] = "Vui lòng chọn đáp  án";
        }

        if($error){
            return redirect()->back()->with('notice', $error);
        }else{
            $correct = $request->correct;
            $questions = $request->question;
            $isCorrect = $request->correct;
            $answers = $request->answers;
            $test = new Test();
            $test->name = $request->testname;
            $test->type_test = $request->testtype;
            $test->save();
            if ($test->save()) {
                $test_id = $test->id;
                $content = new Content();
                $content->name = $request->name;
                $content->content = $request->content;
                $content->time = $request->times;
                $content->test_id = $test_id;
                $content->save();
               
                if ($content->save()) {

                    if ($request->testtype === "Listening" && $request->file('mp3')->isValid()) {

                        $fileExtension = $request->file('mp3')->getClientOriginalExtension(); 
                        $fileName = time() . "_" . rand(0,9999999) . "." . $fileExtension;
                        $uploadPath = public_path('/mp3'); // Thư mục upload
                        $request->mp3->move($uploadPath, $fileName);

                        $mp3 = new Mp3();
                        $mp3->mp3 = $fileName;
                        $mp3->content_id = $content->id;
                        $mp3->save();
                    }


                    if ($request->testtype === "Reading" && $request->file('images')->isValid()) {
                        
                        $fileExtension = $request->file('images')->getClientOriginalExtension(); 
                        $fileName = time() . "_" . rand(0,9999999) . "." . $fileExtension;
                        $uploadPath = public_path('/images'); // Thư mục upload
                        $request->images->move($uploadPath, $fileName);
                
                        $images = new Image();
                        $images->image = $fileName;
                        $images->content_id = $content->id;
                        $images->save();
                    }

                    $id = [];

                    for ($i = 0; $i < count($questions); $i++) {
                        $question = new Question();
                        $question->score = 10;
                        $question->question = $questions[$i];
                        $question->content_id = $content->id;
                        $question->save();
                        array_push($id, $question->id);
                        array_push($id, $question->id);
                        array_push($id, $question->id);
                        array_push($id, $question->id);
                        $next++;
                    }

                    if ($next==count($questions)) {
                        for ($i=0; $i < count($id) ; $i++) {
                            $answer = new Answer();
                            $answer->answer = $answers[$i];
                            $answer->iscorrect = $isCorrect[$i];
                            $answer->question_id = $id[$i];
                            $answer->save();
                        }

                        \Session::flash('flash_message', 'Added successful!!!');
                        return redirect()->back()->with('thongbao', 'Success!!');

                    }
                } else {
                    $error['saveQuestion'] = "Something went wrong";
                    return redirect()->back()->with('notice', $error);
                }
            } else {
                $error['saveTest'] = "Something went wrong";
                return redirect()->back()->with('notice', $error);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }

    public function upload(Request $request)
    {

        $image = new Image();
        $count = count($request->file);
        $data = array();
        for ($i = 0; $i < $count; $i++) {
            $filename = $_FILES['file_' . $i];
            $temp = explode(".", $filename['name']);
            
            $location = "images/image_".strtotime(date("Y-m-d H:i:s")).".".$temp[1];
            move_uploaded_file($filename['tmp_name'], $location);
            $data[] = "image_".strtotime(date("Y-m-d H:i:s")).".".$temp[1];    
        
        }
        return Response()->json($data);

    }

    public function uploadMp3(Request $request)
    {
        $count = count($_FILES);

        $data = array();
        for ($i = 0; $i < $count; $i++) {
            $filename = $_FILES['file_' . $i];
            $location = "mp3/" . $filename['name'];
            if (move_uploaded_file($filename['tmp_name'], $location)) {
                $data[] = $filename['name'];
            } else {
                echo 0;
            }
        }
        return Response()->json($data);



    }
}
