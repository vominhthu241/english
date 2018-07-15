<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testresult extends Model
{
    //
    public $table = 'test-result';
    protected $fillable = array('score','correct-answer','student_id');
    
    public function student() {
	return $this->hasMany('User','id');
    }
}
