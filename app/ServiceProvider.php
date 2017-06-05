<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function service()
  {
    return $this->belongsTo('App\Service');
  }
}
