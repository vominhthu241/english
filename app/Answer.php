<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    public $timestamps = true;
    protected $table = "answer";

    public function question() {
        return $this->belongsTo('App\Question','question_id','id');
    }
    protected $ans = [
        'answer' => 'array',
    ];
   
}
