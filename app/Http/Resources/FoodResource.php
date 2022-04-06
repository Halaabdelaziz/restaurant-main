<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return[
        "id"=>$this->id,
        "name"=>$this->name,
        "price"=>$this->price,
        "description"=>$this->description,
        "imagepath"=>$this->imagepath,
        // "image"=>$this->image,
        "cartCounter"=>$this->numOfItem,
        "category_id"=>new CategoryResource($this->category)
       ];
    }
}
