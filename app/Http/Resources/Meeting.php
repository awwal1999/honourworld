<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Meeting extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'photo' => $this->photo,
            'venue' => $this->venue,
            'venue' => $this->venue,
            'date' => $this->date,
            // 'time' => $this->time,
            'category' => $this->category->name,
            'agendas' => Agenda::collection($this->agendas),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
