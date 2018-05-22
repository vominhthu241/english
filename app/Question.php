<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = true;
    protected $table = "question";

    public function content() {
        return $this->belongsTo('App\Content','content_id','id');
    }
    public function answer() {
		return $this->hasMany('App\Answer','id');
	}
}
