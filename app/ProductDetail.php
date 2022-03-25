<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = ['product_id', 'category_id', 'subcategory_id'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
}
