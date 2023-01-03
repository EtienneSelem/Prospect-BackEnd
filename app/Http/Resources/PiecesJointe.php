<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PiecesJointe extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'data' => $this->collection,

            // // 'id' => $this->id,
            // // 'path' => $this->path,
            // // 'type' =>$this->type,
            // 'prospect_id' =>$this->prospect_id,

        ];
    }
}
