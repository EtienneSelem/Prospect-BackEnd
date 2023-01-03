<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Models\Commune;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
     public function index()
    {
        $communes=Commune::all();
        $zones=Zone::all();
        return view('commune.commune',compact('communes','zones'));
    }
    public function store(Request $request)
    {
        $create_commune=new Commune();
        $create_commune->name=$request->name;
        $create_commune->code=$request->code;
        $create_commune->zone_id=$request->zone_id;
        $create_commune->save();
        return back();
    }
     public function edit($id)
    {
        $communes=Commune::find($id);
        $zones=Zone::all();
        return view('commune.editcommune',compact('communes','zones'));
    }
    public function update(Request $request,$id)
    {
        $communes=Commune::find($id);
        $communes->name=$request->input('name');
        $communes->code=$request->input('code');
        $communes->zone_id=$request->input('zone_id');
        $communes->save();
        return redirect()->route('commune');
    }
     public function remove($id)
    {
        $communes=Commune::find($id);
        $communes->delete();
        return redirect()->route('commune');
    }
    /**
     * @OA\Get(
     *      path="/communes/zone/{id}",
     *      operationId="apiGetByZone",
     *      tags={"Communes_Zone_Id"},
     *      summary="affiche la liste des communes rattachées à une zone",
     *      description="renvoit toutes les Communes d'une Zone donnée par son id",
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
    public function apiGetByZone($zoneId){
        $zone = Zone::find($zoneId);
        $zone->communes;
        $commune=$zone->communes;
        return $commune;
    }
}
