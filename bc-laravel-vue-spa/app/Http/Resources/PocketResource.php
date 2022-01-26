<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PocketResource extends JsonResource
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
            'common' => [
                'id' => $this->id,
                'name' => $this->name,
            ],
            'months' => [
                'january' => $this->january,
                'february' => $this->february,
                'march' => $this->march,
                'april' => $this->april,
                'may' => $this->may,
                'june' => $this->june,
                'july' => $this->july,
                'august' => $this->august,
                'september' => $this->september,
                'october' => $this->october,
                'november' => $this-> november,
                'december' => $this->december
            ],
        ];
    }
}
