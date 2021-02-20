<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['title','decription','options','discount','price','stock','address_id','unit_id'];

    protected $casts=[
        'title'=>'array',
        'decription'=>'array',
        'options'=>'array'
    ];
    public function setOptionsAttribute($value)
    {
        $options = [];

        foreach ($value as $array_item) {
            if (!is_null($array_item['key'])) {
                $options[] = $array_item;
            }
        }

        $this->attributes['options'] = json_encode($options);
    }
    public function address()
    {
        return $this->belongsTo(Address::class,'address_id');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'products_tags');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'product_id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class,'product_id');
    }
    public function review()
    {
        return $this->hasMany(Review::class,'product_id');
    }
}
