<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Delivery::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $delivery = new Delivery();
        $delivery->departure_time=$request->departure_time;
        $delivery->arrival=$request->arrival;
        $delivery->order_id=$request->order_id;
        $delivery->save();
        return "stored dellivery";
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Delivery::find($id))
        return Delivery::find($id);
        else
        return "There is no Delivery with this id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $delivery = Delivery::find($id);
        $delivery->departure_time=$request->departure_time;
        $delivery->arrival=$request->arrival;
        $delivery->order_id=$request->order_id;

        $delivery->save();
        return "updated dellivery";

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Delivery::find($id)){
        Delivery::destroy($id);
        return "Deleted";
        }
        else
        return "There is no Delivery with this id";
    }
}
