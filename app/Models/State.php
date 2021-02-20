<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['name','lat','lng','flag','country_id'];
    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }
}
