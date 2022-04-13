<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produkdata extends Model
{
    use HasFactory;
    protected $table = 'produk_data';
    protected $guarded = ['id'];
}
