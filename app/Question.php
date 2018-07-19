<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = true;
    protected $table = "question";
    protected $fillable = array('question','score','filemedia','fileimage', 'content_id');

    public function content() {
        return $this->belongsTo('App\Content','content_id', 'id');
    }

    public function answers() {
		return $this->hasMany('App\Answer');
    }
    
    public function result() {
		return $this->hasMany('App\Answer', 'id')->orderBy(DB::raw('RAND()'));
	}
}
