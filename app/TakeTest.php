<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TakeTest extends Model
{
    //
    public $table = 'take-test';
    public $timestamps = true;

    protected $fillable = [
        'users_id','test_id','status'
    ];
}
