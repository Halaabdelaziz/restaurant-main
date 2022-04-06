<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['user_name','email','phone','InvoiceId','InvoiceURL','total_price','status','PaymentId'];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
