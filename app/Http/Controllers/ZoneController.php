<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Models\Ville;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index()
    {
        $zones=Zone::all();
        $villes=Ville::all();
        return view('zone.zone',compact('zones','villes'));
    }
    public function store(Request $request)
    {
        $create_zone=new Zone();
        $create_zone->name=$request->name;
        $create_zone->code=$request->code;
        $create_zone->ville_id=$request->ville_id;
        $create_zone->save();
        return redirect()->route('zone');
    }
     public function edit($id)
    {
        $zones=Zone::find($id);
        $villes=Ville::all();
        return view('zone.editzone',compact('zones','villes'));
    }
    public function update(Request $request,$id)
    {
        $zones=Zone::find($id);
        $zones->name=$request->input('name');
        $zones->code=$request->input('code');
        $zones->ville_id=$request->input('ville_id');
        $zones->save();
        return redirect()->route('zone');
    }
    public function remove($id)
    {
        $zones=Zone::find($id);
        $zones->delete();
        return redirect()->route('zone');
    }
     /**
     * @OA\Get(
     *      path="/zones/ville/{id}",
     *      operationId="apiGetByVille",
     *      tags={"Zones_Ville_Id"},
     *      summary="affiche la liste des zones rattachées à une ville",
     *      description="renvoit toutes les zones d'une ville donnée par son id",
     *@OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */

    public function apiGetByVille($villeId){
        $ville = Ville::find($villeId);
        $ville->zones;
        $zone=$ville->zones;
        return $zone;
    }

}
