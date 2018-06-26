<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Peer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->information->first_name,
            'last_name' => $this->information->last_name,
            'username' => $this->username,
            'contact' => $this->information->contact_number,
            'gender' => $this->information->gender,
            'address' => $this->information->home_address,
            'birthday' => $this->information->birthday
        ];
    }
}
