<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = true;

    protected $table = "test";

    protected $fillable = ['name'];

    public function testskill() {
        return $this->belongsTo('App\TestSkill','testskill_id','id');
    }

    public function content() {
		return $this->hasMany('App\Content', 'id');
    }

    public function taketests() {
		return $this->hasMany('App\TakeTest');
    }
}
