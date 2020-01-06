<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    public function toArray($request):array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'weight' => $this->weight,
            'waterAmount' => $this->waterAmount
        ];
    }
}
