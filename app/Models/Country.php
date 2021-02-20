<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['name','lat','lng','code','capital','currency','timezones'];
    protected $casts=[
        'timezones'=>'array'
    ];

    public function setTimezonesAttribute($value)
    {
        $timezones = [];

        foreach ($value as $array_item) {
            if (!is_null($array_item['key'])) {
                $timezones[] = $array_item;
            }
        }

        $this->attributes['timezones'] = json_encode($timezones);
    }
    public function states(){
        return $this->hasMany(State::class,'country_id');
    }
}
