<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Content;
use App\Image;
use App\User;
use App\Mp3;
use App\Question;
use App\Result;
use App\TakeTest;
use App\Test;
use App\Testresult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TestController extends Controller
{
    /**
     * Display in admin
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show in admin
        $tests = Test::all();
        return view('admin.page.test.list', compact('tests'));
    }
    /**
     * Display detail of Test
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $test_id = $request->id;
        $content = Content::where('test_id', $test_id)->first();
        $image = Image::where('content_id', $content->id)->first();
        $mp3 = Mp3::where('content_id', $content->id)->first();
        $questions = Question::where('content_id', $content->id)->get();
        $answers = [];

        foreach ($questions as $ques) {
            $answers[] = Answer::where('question_id', $ques->id)->get();
        }

        $data = [
            'test_id' => $test_id,
            'content' => $content,
            'image' => $image,
            'mp3' => $mp3,
            'questions' => $questions,
            'answers' => $answers,
        ];
        return view('admin.page.test.view', ['testdata' => $data]);

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function createTest(Test $test)
    {
        //
        return view('admin.page.test.add');
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'testname' => 'required',
            'testtype' => 'required',
        ], ['testname.required' => 'Field Test Name is requied!',
            'testtype.required' => 'Field Test Type is requied!',
        ]);
        $count = Test::where('name', $request->testname)->count();
        if ($count > 0) {
            return redirect()->back()->with('error', 'Test Name is exist');
        } else {
            $test = new Test;
            $test->name = $request->testname;
            $test->type_test = $request->testtype;
            $test->save();
            return redirect()->back()->with('message', 'Add success!!');
        }
    }

    public function getEditTest($id)
    {
        $test = Test::find($id);

        return view('admin.page.test.edit', ['test' => $test]);
    }

    public function postEditTest(Request $request)
    {
        $this->validate($request, [
            'testname' => 'required',
            'testtype' => 'required',
        ], ['testname.required' => 'Field Test Name is requied!',
            'testtype.required' => 'Field Test Type is requied!',
        ]);
        $test_id = $request->id;
        $test = Test::find($test_id);
        $test->name = $request->testname;
        $test->type_test = $request->testtype;
        $test->save();
        return redirect()->back()->with('message', 'Edit success!!');

    }

    public function getcontentTest(Request $request)
    {
        $test_id = $request->id;
        $content = Content::where('test_id', $test_id)->get();
        $data = [
            'test_id' => $test_id,
            'content' => $content,
        ];
        return view('front.page.test.test', ['contentdata' => $data]);
    }
    /**
     * get data of Test from Database
     * TODO:: Quiz Test
     */
    public function getTest(Request $request)
    {
        if (!$request->session()->has('users')) {
            session(['link' => $request->path()]);
            return redirect()->action('LoginController@toLogin');
        }
        $content_id = $request->id;
        $test_id = Content::where('id', $content_id)->first()->test_id;
        $image = Image::where('content_id', $content_id)->first();
        $mp3 = Mp3::where('content_id', $content_id)->first();
        $questions = Question::where('content_id', $content_id)->get();
        $answers = [];

        foreach ($questions as $ques) {
            $answers[] = Answer::where('question_id', $ques->id)->get();
        }

        $data = [
            'content' => Content::where('id', $content_id)->first(),
            'test_id' => $test_id,
            'image' => $image,
            'mp3' => $mp3,
            'questions' => $questions,
            'answers' => $answers,
        ];

        session()->forget('link');
        return view('front.page.test.view', ['testdata' => $data]);
    }

    /**
     *
     */
    public function postTest(Request $request)
    {
        $userTaken = $request->user_id;
        $testTaken = $request->test_id;
        $contentTaken = $request->content_id;
        $getAnswerKey = array_keys($request->all());
        $getUserAnswer = [];

        $countCorrectAnswer = 0;
        $score = 0;
        $timeTest = Content::select('time')
            ->where('id', $contentTaken)
            ->first()->time;
        $timeRemain = $request->time;
        $timeTaken = (string) (strtotime($timeTest) - strtotime($timeRemain));

        try {
            foreach ($getAnswerKey as $answerKey) {
                if (strpos($answerKey, 'answerno_') === 0) {
                    $getUserAnswer[$answerKey] = $request[$answerKey];
                }
            }

            foreach (array_keys($getUserAnswer) as $answer) {
                $ques_id = explode("_", $answer)[1];
                $isAnswerCorrect = Answer::select('iscorrect')
                    ->where('question_id', $ques_id)
                    ->where('answer', $getUserAnswer[$answer])
                    ->first()
                    ->iscorrect;
                if ($isAnswerCorrect) {
                    $countCorrectAnswer++;
                    $score += Question::select('score')->where('id', $ques_id)->first()->score;
                }
            }

            $testResult = [
                'score' => $score,
                'correct_answer' => $countCorrectAnswer,
                'student_id' => 1,
            ];

            $testresult_id = Testresult::insertGetId($testResult);

            foreach (array_keys($getUserAnswer) as $userAnswer) {
                $ques_id = explode("_", $userAnswer)[1];
                $answer_id = Answer::select('id')
                    ->where('question_id', $ques_id)
                    ->where('answer', $getUserAnswer[$userAnswer])
                    ->first()
                    ->id;
                $result = [
                    'question_id' => $ques_id,
                    'answer_id' => $answer_id,
                    'testresult_id' => $testresult_id,
                ];
                Result::insert($result);
            }

            $takeTest = new TakeTest;
            $takeTest->users_id = $userTaken;
            $takeTest->test_id = $testTaken;
            $takeTest->content_id = $contentTaken;
            $takeTest->status = 1;
            $takeTest->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        $testresult = Testresult::find($userTaken);
        $content = Content::find($contentTaken);
        $test = Test::find($testTaken);
        $result = Result::where('testresult_id',$testresult->id)->first();
        $user = User::find($userTaken);
        $data = [
            'testresult' => $testresult,
            'result' => $result,
            'taketest' => $takeTest,
            'content' => $content,
            'test' => $test,
            'user' => $user,
            'timetaken' =>  gmdate('H:i:s', $timeTaken),
        ];
        return view('front.page.test.result', ['data' => $data]);
        // return redirect()->action('TestController@listTest');
        // echo '</br> number of correct answer:  '. $countCorrectAnswer;
        // echo '</br> number of score:  '. $score;
        // echo '</br> test time: '. $timeTest;
        // echo '</br> time taken: '. gmdate('H:i:s', $timeTaken);
        // echo '</br> time remain: '. $timeRemain;
    }

    public function listTest(Request $request)
    {
        if (!$request->session()->has('users')) {
            return redirect()->action('LoginController@toLogin');
        }

        $tests = Test::all();
        return view('front.page.test.list', compact('tests'));
    }

    public function getlastedTest()
    {
        $lastedtest = Content::orderBy('created_at', 'desc')->take(4)->get();
        return view('front.page.home', ['lastedtest' => $lastedtest]);
    }

    public function getContent($id)
    {
        $content = Content::where('test_id', $id)->get();
        foreach ($content as $contents) {
            echo "<option value='" . $contents->id . "'>" . $contents->name . "</option>";
        }
    }
    
    public function getSolution(Request $request) {
        $content_id = $request->id;
        $questions = Question::where('content_id', $content_id)->get();
        $answers = [];
        foreach ($questions as $ques) {
            $answers[] = Answer::where('question_id', $ques->id)->where('iscorrect',1)->get();
        }
        $data = [
            'answers' => $answers,
        ];

        return view('front.page.test.solution',['data' => $data]);
    }
}
