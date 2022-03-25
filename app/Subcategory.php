<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function productDetails()
    {
        return $this->hasMany('App\ProductDetail');
    }
}
