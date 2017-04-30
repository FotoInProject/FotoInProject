<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{


  public function user()
  {
      return $this->belongsTo('App\User','users_id');
  }
  public function package_category()
    {
        return $this->belongsTo('App\Package_category','packages_categories_id');
    }

  public function booking()
    {
        return $this->hasMany('App\Booking','packages_id');
    }

  public function package_review()
    {
        return $this->hasMany('App\Package_review','packages_id');
    }
  public function package_include()
    {
        return $this->hasMany('App\Package_include','packages_id');
    }


}
