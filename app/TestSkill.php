<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestSkill extends Model
{
    public $timestamps = true; 
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'test_skill';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['test_skill_name'];

    public function test() {
		  return $this->hasMany('App\Test', 'id');
    }
}
