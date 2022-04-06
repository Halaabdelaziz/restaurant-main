<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Food_OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "food" => new FoodResource($this->food),
            "order"=>new OrderResource($this->order)
        ];
    }
}
