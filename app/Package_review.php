<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package_review extends Model
{
  public function user()
    {
        return $this->belongsTo('App\User','users_id');
    }

    public function package()
      {
          return $this->belongsTo('App\Package','packages_id');
      }
}
