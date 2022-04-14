<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Str;

class Product extends Model
{
    protected $casts = ['tags' => 'array'];
    protected $guarded = ['id'];
    protected $appends = ['sell_price_format', 'name_slug', 'wa_link'];

    public function getSellPriceFormatAttribute()
    {
        return number_format($this->sell_price, 0, ',', '.');
    }

    public function getNameSlugAttribute()
    {
        return Str::slug($this->name);
    }

    public function getWaLinkAttribute()
    {
        $phone = "wa.me/" . Setting::first()->phone_with_code . "?text=";
        $text = Setting::first()->whatsapp_template . "\n";
        $text .= '*' . $this->user->name . " - " . $this->name . "*\n";
        $text .= route('product.web.detail', ['id' => $this->id, 'name' => Str::slug($this->name)]);
        return $phone . urlencode($text);
    }

    public function productImages()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function details()
    {
        return $this->hasMany('App\ProductDetail');
    }
}
