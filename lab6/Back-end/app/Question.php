<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $guarded = [];

  public function options()
  {
    return $this->hasMany('App\Option');
  }

  public function test()
  {
    return $this->belongsTo('App\Test');
  }
}
