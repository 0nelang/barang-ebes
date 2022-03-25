<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ["name", "image", "caption"];

    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}
