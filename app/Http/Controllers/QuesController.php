<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Content;
use App\Question;
use App\TestSkill;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuesController extends Controller
{
    //
    /**
     *
     */
    public function index()
    {
        //
        $ques = Question::paginate(15);
        return view('admin.page.question.view', compact('ques'));
    }

    public function create()
    {
        $testskills = TestSkill::all();
        return view('admin.page.question.create', [
            'testskills' => $testskills,
        ]);
    }
    // Choose test_id and content id to create question
    public function postCreate(Request $request)
    {
        $question = new Question();
        //upload image
        if (!empty($request->images)) {
            $fileExtension = !empty($request->images) ? $request->file('images')->getClientOriginalExtension() : '';
            $fileName = time() . "_" . rand(0, 9999999) . "." . $fileExtension;
            $uploadPath = public_path('/images'); // Thư mục upload
            $request->images->move($uploadPath, $fileName);
            $question->fileimage = $fileName;
        }
        //upload mp3
        if (!empty($request->mp3)) {
            $mp3Extension = !empty($request->mp3) ? $request->file('mp3')->getClientOriginalExtension() : '';
            $mp3Name = time() . "_" . rand(0, 9999999) . "." . $mp3Extension;
            $uploadPath = public_path('/mp3'); // Thư mục upload
            $request->mp3->move($uploadPath, $mp3Name);
            $question->filemedia = $mp3Name;
        }
        $question->question = $request->question;
        $question->score = "10";
        $question->content_id = $request->content_id;
        $question->save();
        $id = $question->id;
        if ($id == true) {
            $answer = new Answer();
            $correct = $request->correct;
            foreach ($request->answers as $key => $v) {
                $data = array(
                    'answer' => $request->answers[$key],
                    'iscorrect' => $correct[$key],
                    'question_id' => $id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                );
                Answer::insert($data);
            }
            return redirect()->back()->with('message', 'Add success!!');
        }
        else {
            return redirect()->back()->with('error', 'Add error!!');
        }
    }
    /*
     */
    public function edit(Request $request)
    {
        $question = Question::where('id', $request->id)->first();
        $answers = Answer::where('question_id', $question->id)->get();
        $data = [
            'question' => $question,
            'answers' => $answers,
        ];

        return view('admin.page.question.edit', ['quesdata' => $data]);
    }

    public function postEdit(Request $request)
    {

        $question_id = $request->question_id;
        $question = Question::where('id', $question_id)->first();
        //upload image
        if (!empty($request->images)) {
            $fileExtension = !empty($request->images) ? $request->file('images')->getClientOriginalExtension() : '';
            $fileName = time() . "_" . rand(0, 9999999) . "." . $fileExtension;
            $uploadPath = public_path('/images'); // Thư mục upload
            $request->images->move($uploadPath, $fileName);
            $question->fileimage = $fileName;
        }
        //upload mp3
        if (!empty($request->mp3)) {
            $mp3Extension = !empty($request->mp3) ? $request->file('mp3')->getClientOriginalExtension() : '';
            $mp3Name = time() . "_" . rand(0, 9999999) . "." . $mp3Extension;
            $uploadPath = public_path('/mp3'); // Thư mục upload
            $request->mp3->move($uploadPath, $mp3Name);
            $question->filemedia = $mp3Name;
        }
        $question->question = $request->question;
        $question->save();

        $answersName = $request->answers;
        $answers = Answer::where('question_id', $question_id)->get();
        foreach ($answers as $answer) {
            $answer->iscorrect = 0;
            $answer->answer = $answersName[$answer->id];
            $answer->save();
        }
        $newAnswer = $request->newAnswer;
        $setAnswer = Answer::where('id', $newAnswer)->first();
        $setAnswer->iscorrect = 1;
        $setAnswer->save();
        return redirect()->back()->with('message', 'Edit success!!');
    }

    public function destroy(Request $request)
    {
        Question::find($request->id)->delete();
        return json_encode('Deleted successful!!');

    }
}
