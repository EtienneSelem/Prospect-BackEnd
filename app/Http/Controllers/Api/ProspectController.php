<?php

namespace App\Http\Controllers\Api;

use App\Models\Prospect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProspectResource;
use App\Http\Controllers\UploadFilesController;

class ProspectController extends Controller
{
    public function index()
    {
        try {
            $prospects = Prospect::all();

            if ($prospects->count() > 0) {
                return json_encode([
                    'code' => 200,
                    'title' => 'success !',
                    'message' => 'Liste des prospects enregistrés !',
                    'response' => $prospects
                ]);
            } else {
                return json_encode([
                    'code' => 404,
                    'title' => 'error !',
                    'message' => 'Aucun prospect enregistré pour le moment !',
                    'response' => ''
                ]);
            }
        } catch (\Throwable $th) {
            return json_encode([
                'code' => 404,
                'title' => 'error !',
                'message' => 'Aucun prospect enregistré pour le moment !',
                'response' => $th
            ]);
        }
    }

    public function getByAgentId($id)
    {
        try {
            $prospects = Prospect::where('agent_id', $id)->get();
            return json_encode(ProspectResource::getListInstance($prospects));
        } catch (\Throwable $th) {

            return json_encode([
                'code' => 400,
                'message' => $th->getMessage()
            ], 400);
            return $th;
            // return json_encode([
            //     'code' => 400,
            //     'message' => 'Ce prospect n\existe pas !'
            // ]);
        }
    }
    public function getByCurrentUser()
    {
        $userId = Auth::user()->id;

        try {
            $prospects = Prospect::where('agent_id', $userId)->get();
            return json_encode(ProspectResource::getListInstance($prospects));
        } catch (\Throwable $th) {

            return json_encode([
                'code' => 400,
                'message' => $th->getMessage()
            ], 400);
        }
    }
    public function show($id)
    {
        try {
            $prospect = Prospect::where('id', $id)->first();

            return json_encode(new ProspectResource($prospect));
        } catch (\Throwable $th) {
            return json_encode([
                'code' => 400,
                'message' => 'Ce prospect n\'existe pas !'
            ]);
        }
    }

    public function allwithstate($state)
    {
        try {
            $prospects = Prospect::where('state', $state)->get();

            return json_encode(ProspectResource::getStateInstance($prospects));
        } catch (\Throwable $th) {
            return $th;
            return json_encode([
                'code' => 400,
                'message' => 'Cet état n\'existe pas !'
            ]);
        }
    }

    public function getStatusByRemoteId($remoteId)
    {
        try {
            $prospect = Prospect::where('remote_id', $remoteId)->first();


            if ($prospect) {
                $data = [
                    'state' => $prospect['state'],
                    'id' => $prospect['id'],
                    'remote_id' => $prospect['remote_id'],
                ];
                return response()->json([
                    'status' => 'SUCCESS',
                    'data' => $data,
                ], 200);
            } else {
                return response()->json([
                    'status' => 'SUCCESS',
                    'data' => 'Resource not found.'
                ], 404);
            }
        } catch (\Exception $th) {
            return response()->json([
                'status' => 'ECHEC',
                'data' => $th->getMessage()
            ], 400);
        }
    }

    function store(Request $request)
    {
        $i1 = $i2 = $d1 = $d2 = null;
        foreach ($request->files->all() as $k => $file) {
            if ($k == 'image1') $i1 = UploadFilesController::saveImage($file);
            if ($k == 'image2') $i2 = UploadFilesController::saveImage($file);
            if ($k == 'doc1') $d1 = UploadFilesController::saveDoc($file);
            if ($k == 'doc2') $d2 = UploadFilesController::saveDoc($file);
        }

        try {

            $prospect = Prospect::create([
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
                'agent_id' => $request->agent_id,
                'commune_id' => $request->commune_id,
                'zone_id' => $request->zone_id,
                'ville_id' => $request->ville_id,
                'province_id' => $request->province_id,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'type_activities_id' => $request->type_activities_id,
                'company_phone' => $request->company_phone,
                'offer_id' => $request->offer_id,
                'state' => $request->state,
                'pieces_jointes_id' => $request->pieces_jointes_id,
                'remote_id' => $request->remote_id,
            ]);

            return json_encode([
                'code' => 200,
                'message' => 'Success !',
                'data' => ProspectResource::getInstance($prospect)
            ]);
            //code...
        } catch (\Illuminate\Database\QueryException $th) {
            return $th;
            // return json_encode([
            //                 'code' => 400,
            //                 'message' => 'Impossible de créer ce prospect !
            //             ]);
        } catch (\Throwable $th) {
            return $th;
            // return json_encode([
            //                 'code' => 400,
            //                 'message' => 'Impossible de créer ce prospect !
            //             ]);
        } catch (\Throwable $th) {
            return $th;
            // return json_encode([
            //                 'code' => 400,
            //                 'message' => 'Impossible de créer ce prospect !
            //             ]);
        }
    }
}
