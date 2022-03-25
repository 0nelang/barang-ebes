<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeProduct extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}
