<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use Carbon\Carbon;
use App\Http\Controllers\Auth;

class QuesController extends Controller
{
    //
    /**
     * 
     */
    public function create() {
        return view('admin.page.question.create');
    }

    public function postCreate(Request $request)
    {
        $question = new Question();
        $question->question     = $request->question;
        $question->content_id   = 1;
        $question->save();
        $id = $question->id;
        if($id == true){
            $answer = new Answer();
            $correct = $request->correct;
            foreach($request->answers as $key=> $v){
                $data = array(
                    'answer' => $request->answers[$key],
                    'iscorrect'=>$correct[$key],
                    'question_id'=>$id,
                ); 
                Answer::insert($data);
            }
        }
    }
}
