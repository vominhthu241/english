<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //
    public $timestamps = true;
    protected $table = "content";

    public function test() {
        return $this->belongsTo('App\Test','test_id','id');
    }

    public function questions() {
        return $this->hasMany('App\Question');
    }
}
