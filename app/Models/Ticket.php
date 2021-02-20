<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['user_id','order_id','ticket_type_id','title','status','message'];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
    public function ticketType()
    {
        return $this->belongsTo(TicketType::class,'ticket_type_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
