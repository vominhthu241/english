<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Content;
use App\Image;
use App\Mp3;
use App\Question;
use App\Result;
use App\TakeTest;
use App\Test;
use App\Testresult;
use App\TestSkill;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TestController extends Controller
{

    public function index()
    {
        // Show in admin
        $tests = Test::paginate(15);
        $testskills = TestSkill::all();
        return view('admin.page.test.list', ['tests' => $tests, 'testskills' => $testskills]);
    }

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

    public function detail(Request $request)
    {
        $test_id = $request->id;
        $test = Test::where('id', $test_id)->first();
        $testskill = TestSkill::where('id', $test_id)->first();
        $contents = Content::where('test_id', $test_id)->get();
        $questions = [];
        $answers = [];
        foreach ($contents as $content) {
            $questions[$content->id] = Question::where('content_id', $content->id)->get();
            foreach ($questions[$content->id] as $question) {
                $answers[$question->id] = Answer::where('question_id', $question->id)->get();
            }
        }

        $data = [
            'test' => $test,
            'testskill' => $testskill,
            'contents' => $contents,
            'questions' => $questions,
            'answers' => $answers,
        ];

        return view('admin.page.test.show', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.page.test.create');
    }

    public function createTest(Test $test)
    {
        $testskill = TestSkill::all();
        return view('admin.page.test.add', ['testskill' => $testskill]);
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'testname' => 'required',
            'testtype' => 'required',
            'times' => 'required',
            'testskill' => 'required',
        ], ['testname.required' => 'Field Test Name is requied!',
            'testtype.required' => 'Field Test Type is requied!',
            'times.required' => 'Field Time is requied!',
            'testskill.required' => 'Field Test Skill is requied!',
        ]);
        $count = Test::where('name', $request->testname)->count();
        if ($count > 0) {
            return redirect()->back()->with('error', 'Test Name is exist');
        } else {
            $test = new Test;
            $test->name = $request->testname;
            $test->type_test = $request->testtype;
            $test->time = $request->times;
            $test->testskill_id = $request->testskill;
            $test->status = $request->status;
            $test->save();
            return redirect()->back()->with('message', 'Add success!!');
        }
    }

    public function getEditTest($id)
    {
        $test = Test::find($id);
        $testskill = TestSkill::all();
        return view('admin.page.test.edit', ['test' => $test, 'testskill' => $testskill]);
    }

    public function postEditTest(Request $request)
    {
        $this->validate($request, [
            'testname' => 'required',
            'testtype' => 'required',
            'times' => 'required',
            'testskill' => 'required',
        ], ['testname.required' => 'Field Test Name is requied!',
            'testtype.required' => 'Field Test Type is requied!',
            'times.required' => 'Field Time is requied!',
            'testskill.required' => 'Field Test Skill is requied!',
        ]);
        $test_id = $request->id;
        $test = Test::find($test_id);
        $test->name = $request->testname;
        $test->type_test = $request->testtype;
        $test->time = $request->times;
        $test->testskill_id = $request->testskill;
        $test->status = $request->status;
        $test->save();
        return redirect()->back()->with('message', 'Edit success!!');

    }

    public function getcontentTest(Request $request)
    {
        $test_id = $request->id;
        $test = Test::find($test_id);
        $taketests = TakeTest::where('test_id', $test_id)->get();
        $results = [];

        foreach ($taketests as $taketest) {
            $results[] = [
                'user' => $taketest->user->name,
                'score' => $taketest->testresult->score,
                'time' => $taketest->testresult->time_taken,
                'date' => $taketest->created_at,
            ];
        };

        usort($results, function ($a, $b) {
            $sorted = $b['score'] <=> $a['score'];
            if ($sorted == 0) {
                $sorted = $a['time'] <=> $b['time'];
            }
            return $sorted;
        });

        $data = [
            'test_id' => $test_id,
            'test' => $test,
            'results' => $results,
        ];
        return view('front.page.test.test', [
            'contentdata' => $data,
        ]);
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
        $test_id = $request->id;
        $test = Test::where('id', $test_id)->first();
        $contents = Content::where('test_id', $test_id)->get();

        $data = [
            'contents' => $contents,
            'test' => $test,
        ];

        session()->forget('link');
        return view('front.page.test.view', ['testdata' => $data]);
    }
    // submit test
    public function postTest(Request $request)
    {
        $userTaken = $request->user_id;
        $testTaken = $request->test_id;
        $getAnswerKey = array_keys($request->all());
        $getUserAnswer = [];

        $countCorrectAnswer = 0;
        $score = 0;
        $timeTest = Test::select('time')
            ->where('id', $testTaken)
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
                'student_id' => $userTaken,
                'taken_answer' => json_encode($getUserAnswer),
                'time_taken' => gmdate('H:i:s', $timeTaken),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            $testresult_id = Testresult::insertGetId($testResult);

            foreach (array_keys($getUserAnswer) as $userAnswer) {
                $ques_id = explode("_", $userAnswer)[1];
                $answer_id = Answer::select('id')
                    ->where('question_id', $ques_id)
                    ->where('answer', $getUserAnswer[$userAnswer])
                    ->first()
                    ->id;
                $result = new Result;
                $result->question_id = $ques_id;
                $result->answer_id = $answer_id;
                $result->testresult_id = $testresult_id;
                $result->save();
            }

            $takeTest = new TakeTest;
            $takeTest->users_id = $userTaken;
            $takeTest->test_id = $testTaken;
            $takeTest->testresult_id = $testresult_id;
            $takeTest->status = 1;
            $takeTest->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        $test = Test::find($testTaken);
        $user = User::find($userTaken);
        $data = [
            'testskill' => TestSkill::find($test->testskill_id),
            'taketest' => $takeTest,
            'testresult' => Testresult::find($testresult_id),
            'test' => $test,
            'user' => $user,
        ];

        return response()->json($data);
    }

    public function listTestRead(Request $request)
    {
        if (!$request->session()->has('users')) {
            return redirect()->action('LoginController@toLogin');
        }
        $testincomplete1 = Test::where('status', 1)
            ->where('testskill_id', 2)
            ->where('type_test', 'Beginner')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Incomplete' . '%')
            ->get();
        $testincomplete2 = Test::where('status', 1)
            ->where('testskill_id', 2)
            ->where('type_test', 'Intermediate')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Incomplete' . '%')
            ->get();
        $testincomplete3 = Test::where('status', 1)
            ->where('testskill_id', 2)
            ->where('type_test', 'Advanced')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Incomplete' . '%')
            ->get();
        $testtext1 = Test::where('status', 1)
            ->where('testskill_id', 2)
            ->where('type_test', 'Beginner')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Text' . '%')
            ->get();
        $testtext2 = Test::where('status', 1)
            ->where('testskill_id', 2)
            ->where('type_test', 'Intermediate')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Text' . '%')
            ->get();
        $testtext3 = Test::where('status', 1)
            ->where('testskill_id', 2)
            ->where('type_test', 'Advanced')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Text' . '%')
            ->get();
        $testsingle1 = Test::where('status', 1)
            ->where('testskill_id', 2)
            ->where('type_test', 'Beginner')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Single' . '%')
            ->get();
        $testsingle2 = Test::where('status', 1)
            ->where('testskill_id', 2)
            ->where('type_test', 'Intermediate')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Single' . '%')
            ->get();
        $testsingle3 = Test::where('status', 1)
            ->where('testskill_id', 2)
            ->where('type_test', 'Advanced')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Single' . '%')
            ->get();
        $testdouble1 = Test::where('status', 1)
            ->where('testskill_id', 2)
            ->where('type_test', 'Beginner')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Double' . '%')
            ->get();
        $testdouble2 = Test::where('status', 1)
            ->where('testskill_id', 2)
            ->where('type_test', 'Intermediate')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Double' . '%')
            ->get();
        $testdouble3 = Test::where('status', 1)
            ->where('testskill_id', 2)
            ->where('type_test', 'Advanced')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Double' . '%')
            ->get();
        $data = [
            'testincomplete1' => $testincomplete1,
            'testincomplete2' => $testincomplete2,
            'testincomplete3' => $testincomplete3,
            'testtext1' => $testtext1,
            'testtext2' => $testtext2,
            'testtext3' => $testtext3,
            'testsingle1' => $testsingle1,
            'testsingle2' => $testsingle2,
            'testsingle3' => $testsingle3,
            'testdouble1' => $testdouble1,
            'testdouble2' => $testdouble2,
            'testdouble3' => $testdouble3,
        ];
        return view('front.page.test.list', ['tests' => $data]);
    }

    public function listTestLis(Request $request)
    {
        if (!$request->session()->has('users')) {
            return redirect()->action('LoginController@toLogin');
        }
        $testphoto1 = Test::where('status', 1)
            ->where('testskill_id', 1)
            ->where('type_test', 'Beginner')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Photo' . '%')
            ->get();
        $testphoto2 = Test::where('status', 1)
            ->where('testskill_id', 1)
            ->where('type_test', 'Intermediate')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Photo' . '%')
            ->get();
        $testphoto3 = Test::where('status', 1)
            ->where('testskill_id', 1)
            ->where('type_test', 'Advanced')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Photo' . '%')
            ->get();
        $testquestion1 = Test::where('status', 1)
            ->where('testskill_id', 1)
            ->where('type_test', 'Beginner')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Question' . '%')
            ->get();
        $testquestion2 = Test::where('status', 1)
            ->where('testskill_id', 1)
            ->where('type_test', 'Intermediate')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Question' . '%')
            ->get();
        $testquestion3 = Test::where('status', 1)
            ->where('testskill_id', 1)
            ->where('type_test', 'Advanced')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Question' . '%')
            ->get();
        $testconver1 = Test::where('status', 1)
            ->where('testskill_id', 1)
            ->where('type_test', 'Beginner')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Short Conversation' . '%')
            ->get();
        $testconver2 = Test::where('status', 1)
            ->where('testskill_id', 1)
            ->where('type_test', 'Intermediate')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Short Conversation' . '%')
            ->get();
        $testconver3 = Test::where('status', 1)
            ->where('testskill_id', 1)
            ->where('type_test', 'Advanced')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Short Conversation' . '%')
            ->get();
        $testtalk1 = Test::where('status', 1)
            ->where('testskill_id', 1)
            ->where('type_test', 'Beginner')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Short Talk' . '%')
            ->get();
        $testtalk2 = Test::where('status', 1)
            ->where('testskill_id', 1)
            ->where('type_test', 'Intermediate')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Short Talk' . '%')
            ->get();
        $testtalk3 = Test::where('status', 1)
            ->where('testskill_id', 1)
            ->where('type_test', 'Advanced')
            ->orderBy('name', 'asc')
            ->where('name', 'LIKE', 'Short Talk' . '%')
            ->get();
        $data = [
            'testphoto1' => $testphoto1,
            'testphoto2' => $testphoto2,
            'testphoto3' => $testphoto3,
            'testquestion1' => $testquestion1,
            'testquestion2' => $testquestion2,
            'testquestion3' => $testquestion3,
            'testconver1' => $testconver1,
            'testconver2' => $testconver2,
            'testconver3' => $testconver3,
            'testtalk1' => $testtalk1,
            'testtalk2' => $testtalk2,
            'testtalk3' => $testtalk3,
        ];
        return view('front.page.test.listlisten', ['tests' => $data]);
    }

    public function getlastedTest()
    {
        $lastedtest = Content::orderBy('created_at', 'desc')->take(4)->get();
        $data = [
            'lastedtest' => $lastedtest,
        ];
        return view('front.page.home', ['lastedtest' => $data]);
    }

    public function getContents($id)
    {
        return response()->json(Content::where('test_id', $id)->get());
    }

    // public function getSolution(Request $request)
    // {
    //     $content_id = $request->id;
    //     $questions = Question::where('content_id', $content_id)->get();
    //     $answers = [];
    //     foreach ($questions as $ques) {
    //         $answers[] = Answer::where('question_id', $ques->id)->where('iscorrect', 1)->get();
    //     }
    //     $data = [
    //         'answers' => $answers,
    //     ];

    //     return view('front.page.test.solution', ['data' => $data]);
    // }
    public function getSolution(Request $request)
    {
        $test_id = $request->id;
        $test = Test::where('id', $test_id)->first();
        $testskill = TestSkill::where('id', $test_id)->first();
        $contents = Content::where('test_id', $test_id)->get();
        $questions = [];
        $answers = [];
        foreach ($contents as $content) {
            $questions[$content->id] = Question::where('content_id', $content->id)->get();
            foreach ($questions[$content->id] as $question) {
                $answers[$question->id] = Answer::where('question_id', $question->id)->get();
            }
        }

        $data = [
            'test' => $test,
            'testskill' => $testskill,
            'contents' => $contents,
            'questions' => $questions,
            'answers' => $answers,
        ];

        return view('front.page.test.solution', ['data' => $data]);
    }

    public function destroy(Request $request)
    {
        Test::find($request->id)->delete();
        return json_encode('Deleted successful!!');
    }

}
