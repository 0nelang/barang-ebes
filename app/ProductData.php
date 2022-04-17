<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductData extends Model
{
    public $timestamps = false;
    protected $table = 'product_data';
    protected $guarded = ['id'];
}
