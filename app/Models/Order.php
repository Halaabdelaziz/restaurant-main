<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['user_id','payment_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    // public function foods()
    // {
    //     return $this->belongsToMany(Food::class);
    // }

// many to many
    public function food_order()
    {
        return $this->belongsTo(Food_Order::class);
    }
}
