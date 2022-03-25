<?php

namespace App;

use App\Product;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'username', 'password', 'owner', 'phone', 'address', 'logo',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['phone_with_code'];

    public function types()
    {
        return Product::join('types as t', 't.id', 'products.type_id')->where('user_id', $this->id)->groupBy('type_id')->get();
    }

    public function typeNames()
    {
        return Product::join('types as t', 't.id', 'products.type_id')->where('user_id', $this->id)->groupBy('type_id')->pluck('t.name');
    }

    public function getPhoneWithCodeAttribute()
    {
        $phone = explode('08', $this->phone);
        return '628' . $phone[1];
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
