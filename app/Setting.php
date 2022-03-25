<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        "name",
        "description",
        "image",
        "youtube",
        "facebook",
        "instagram",
    ];

    protected $appends = ['phone_with_code'];

    public function getPhoneWithCodeAttribute()
    {
        $phone = explode('08', $this->phone);
        return '628' . $phone[1];
    }

}
