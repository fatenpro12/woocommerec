<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;
    use HasFactory,SoftDeletes;
    protected $fillable=['title','decription','options','discount','price','stock','address_id','unit_id','category_id'];

    protected $casts=[
        'options'=>'array'
    ];

    protected $appends =['main-image','photos'];

    public function setTitleAttribute($value) {
        $this->attributes['title'] = json_encode($value,JSON_UNESCAPED_UNICODE);
    }
    public function getTitleAttribute($value){
        return json_decode($value);
    }
    public function setDescriptionAttribute($value) {
        $this->attributes['description'] = json_encode($value,JSON_UNESCAPED_UNICODE);
    }
    public function getDescriptionAttribute($value){
        return json_decode($value);
    }
    public function setOptionsAttribute($value)
    {
        $options = [];

       /* foreach ($value as $array_item) {
            if (!is_null($array_item['key'])) {
                $options[] = $array_item;
            }
        }*/

        $this->attributes['options'] = json_encode($value);
    }
    public function registerMediaCollections()
    {
        $this->addMediaCollection('main_image')->singleFile();
        $this->addMediaCollection('photos');
    }
    public function getPhotosAttribute()
    {
        return $this->getMedia('photos');
    }
    public function getMainImageAttribute()
    {
        return $this->getFirstMedia('main_image');
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
