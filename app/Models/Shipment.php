<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['name','description','phone'];

    public function orders()
    {
        return $this->hasMany(Order::class,'ship_id');
    }
}
