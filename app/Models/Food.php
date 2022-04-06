<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    protected $fillable = ['description','name' , 'price' ,'imagepath','numOfItem'];


    // public function order()
    // {
    //     return $this->belongsToMany(Order::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function food_orders()
    {
        return $this->hasMany(Food_Order::class);
    }
}
