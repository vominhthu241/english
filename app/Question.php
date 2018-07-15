<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = true;
    protected $table = "question";
    protected $fillable = array('question', 'content_id', 'score');

    public static $question_rules = array(
        'question' => 'required',
        'score' => 'required|integer',
	);

    public function content() {
        return $this->belongsTo('App\Content','content_id', 'id');
    }

    public function answer() {
		return $this->hasMany('App\Answer', 'id');
    }
    
    public function result() {
		return $this->hasMany('App\Answer', 'id')->orderBy(DB::raw('RAND()'));
	}

    // public static function tinhDiem($question_id, $anwser_id){
	// 	$question = self::find($questionId);
	// 	$anwser = Dapan::find($anwserId);
	// 	if($questionId == $anwser->cauhoi_id){
	// 		if($anwser->dapan_dung){
	// 			return $question->diem;
	// 		}
	// 	}
		
	// 	return 0;
	// }
}
