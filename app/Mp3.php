<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mp3 extends Model
{
    //
    public $timestamps = true;
    protected $table = "mp3";

    public function content() {
        return $this->belongsTo('App\Content','content_id','id');
    }
}
