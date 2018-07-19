<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    //
    public $table = 'result';
    protected $fillable = array('question_id','answer_id','test_result_id');
    
    public static $result_rules = array(
        'answer_id'      =>  'integer|boolean',
    );
    
    public function question() {
        return $this->belongsTo('Question','id');
    }
    public function answer() {
        return $this->belongsTo('Answer','id');
    }
    public function testresult() {
	return $this->belongsTo('Testresult','id');
    }
    
}
