<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Content;
use App\Test;
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
        $ques = Question::all();
        return view('admin.page.question.view', compact('ques'));
    }

    public function create()
    {
        $tests = Test::all();
        $contents = Content::all();
        return view('admin.page.question.create', [
            'tests' => $tests,
            'contents' => $contents
        ]);
    }
    // Choose test_id and content id to create question
    public function getContent() {
        $test = Test::all();
        $content = Content::all();
    }
    public function postCreate(Request $request)
    {
        $checkCorrect = true;
        $answers = $request->answers;
        $correct = $request->correct;
        $error = array();
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
             $question = new Question();
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
                        );
                        Answer::insert($data);
                    }
                    return redirect()->back()->with('message','Add success!!');
                }
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
        
        return view('admin.page.question.edit',['quesdata'=>$data]);
    }

    public function postEdit(Request $request) {

        
        $question_id = $request->question_id;
        $question = Question::where('id', $question_id)->first();
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
        return redirect()->action('QuesController@index');
    }

    public function destroy($id)
    {
        $question=Question::find($id);
        $count=Answer::where('question_id',$id)->count();
        if($count>0){
            return '1';
        }
        else{
            $question->delete();
            return '2';
        }
        
    }
}
