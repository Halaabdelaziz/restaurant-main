<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "User_Name"=>$this->name,
            "User_Email"=>$this->email,
            "User_Address"=>$this->address,
            "User_Phone"=>$this->phone,
        ];
    }
}
