<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food_Order extends Model
{
    use HasFactory;
    protected $table = 'food_order';
    protected $fillable = ['quantity','food_id','order_id'];



    public function food()
    {
        return $this->belongsTo(Food::class);
    }


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
