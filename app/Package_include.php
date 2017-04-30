<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package_include extends Model
{
  public function package()
    {
        return $this->belongsTo('App\Package','packages_id');
    }
}
