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

    // public static $result_langs = array(
    //     'tendapan.requried'		=>	'Vui lòng nhập đáp án',
    //     'dapan_dung.integer'		=>	'Bạn phải nhập số không được nhập chữ hay ký tự',
	// 'dapan_dung.boolean'		=>	'Bạn phải nhập số 0 hoặc 1',
    // );
    
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
