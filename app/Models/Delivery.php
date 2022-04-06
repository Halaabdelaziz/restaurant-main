<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = ['arrival' ,'departure_time','order_id'];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }


}
