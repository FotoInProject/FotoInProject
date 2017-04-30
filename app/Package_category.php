<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package_category extends Model
{
  public function package()
    {
        return $this->hasMany('App\Package','packages_categories_id');
    }
}
