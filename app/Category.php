<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }
  
    public function productDetails()
    {
        return $this->hasMany('App\Product', 'kondisi', 'id');
    }
}
