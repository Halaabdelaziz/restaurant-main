<?php

namespace App\Http\Controllers;

use App\Notifications\orderOperations;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use  App\Models\Food_Order;
use App\Models\User;
use App\Models\Order;
use App\Models\Delivery;
use App\Http\Resources\Food_OrderResource;

class Food_OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return Food_OrderResource::collection(Food_Order::all());
        // return Food_Order::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $details=new Food_Order();
        $details->quantity=$request->quantity;
        $details->food_id=$request->food_id;
        $details->order_id=$request->order_id;
        $details->save();
       // $quantity=$details->quantity;
    //     $time=($quantity*5)+20;
    //     $hours = floor($time / 60);
    //     $minutes = $time % 60;
    //     $details->save();
    //     $OrderData=[
    //         'Hello'=>"Hello from our team we are here to help you",
    //         'username'=>$user['name'],
    //         'id'=>$user['id'],
    //         'orderText'=>"you've created your order and it will be delivered for you after ",
    //         'arrival'=>$hours.' hours and '.$minutes.' minutes',
    //         'Thankyou'=>"Thank you for making order and your order ID is ",
    //         'order_id'=>$details->order_id,
    //     ];
    //     $user->notify(new orderOperations($OrderData));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new Food_OrderResource(Food_Order::find($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $details = Food_Order::find($id);
        $details->quantity=$request->quantity;
        $details->food_id=$request->food_id;
        $details->order_id=$request->order_id;
        $details->save();
        return "Done";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Food_Order::destroy($id);
    }
}
