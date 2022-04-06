<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;
use App\Http\Resources\FoodResource;
use  Illuminate\Support\Facades\Auth;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return FoodResource::collection(Food::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food=new Food();
        $food->name=$request->name;
        $food->description=$request->description;
        $food->price=$request->price;
        $food->category_id=$request->category_id;
        $food->numOfItem=$request->numOfItem;
        $food->imagepath=$request->imagepath;

        $food->save();
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food=Food::find($id);
        return new FoodResource($food);
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
            $food = Food::find($id);
            $food->name=$request->name;
            $food->description=$request->description;
            $food->price=$request->price;
            $food->category_id=$request->category_id;
            $food->imagepath=$request->imagepath;
            $food->save();
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Food::destroy($id);
    }
}
