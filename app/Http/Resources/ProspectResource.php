<?php

namespace App\Http\Resources;

use App\Models\Prospect;

use App\Http\Resources\PiecesJointeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProspectResource
{
    static function getInstance(\App\Models\Prospect $prospect)
    {

        return [
            'id' => $prospect->id,
            'latitude' => $prospect->latitude,
            'longitude' => $prospect->longitude,
            'agent' => [
                'id' => $prospect->agent->id,
                'name' => $prospect->agent->name,
            ],
            'commune' => [
                'id' => $prospect->commune->id,
                'name' => $prospect->commune->name,
                'zone' => [
                    'id' => $prospect->commune->zone->id,
                    'name' => $prospect->commune->zone->name,
                    'ville' => [
                        'id' => $prospect->commune->zone->ville->id,
                        'name' => $prospect->commune->zone->ville->name,
                        'province' => [
                            'id' => $prospect->commune->zone->ville->province->id,
                            'name' => $prospect->commune->zone->ville->province->name,
                        ],
                    ],
                ],
            ],
            'company_name' => $prospect->company_name,
            'company_address' => $prospect->company_address,
            'type_activities' => [
                'id' => $prospect->typeActivities->id,
                'name' => $prospect->typeActivities->name,
            ],
            'company_phone' => $prospect->company_phone,
            'offer' => [
                'id' => $prospect->offer->id,
                'name' => $prospect->offer->name,
            ],
            'state' => $prospect->state,
            'piecesjointes' => PiecesJointeResource::collection($prospect->piecesjointes),
            'remote_id' => $prospect->remote_id,
        ];
    }
    static function getListInstance($prospects)
    {
        $list = [];
        foreach ($prospects as $prospect) {
            $list[] = self::getInstance($prospect);
        }

        return $list;
    }

    static function getStateInstance($state)
    {
        $status = [];
        foreach ($state as $stat) {
            $status[] = self::getInstance($stat);
        }
        return $status;
    }
}
