<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testresult extends Model
{
    //
    public $table = 'test_result';
    protected $fillable = array('score','correct_answer','student_id');
    
    public function student() {
	return $this->hasMany('User','id');
    }
}
