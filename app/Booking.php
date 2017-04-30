<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  public function user()
    {
        return $this->belongsTo('App\User','users_id');
    }
    public function package()
      {
          return $this->belongsTo('App\Booking','packages_id');
      }


}
