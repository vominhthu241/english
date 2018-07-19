<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TakeTest extends Model
{
    //
    public $table = 'take_test';
    public $timestamps = true;

    protected $fillable = [
        'users_id','test_id','status'
    ];

    public function testresult()
    {
        return $this->hasOne('App\Testresult', 'id');
    }

    public function test(){
        return $this->hasOne('App\Test', 'id', 'test_id');
    }

    public function user(){
        return $this->hasOne('App\User', 'id', 'users_id');
    }
}
