<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['payment_status','shipment_date','payment_id','payment_method','start_date','end_date','user_id','product_id','quantity','ship_id'];
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function ship()
    {
        return $this->belongsTo(Shipment::class,'ship_id');
    }
}
