<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['street','house_number','post_code','city_id'];

    public function city()
    {return $this->belongsTo(City::class,'city_id');}

    public function products()
    {
        return $this->hasMany(Product::class,'address_id');
    }
}
