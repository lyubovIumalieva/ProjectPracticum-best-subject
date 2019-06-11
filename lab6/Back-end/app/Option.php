<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
  protected $guarded = [];

  public function test()
  {
    return $this->belongsTo('App\Question');
  }
}
