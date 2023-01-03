<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use App\Models\Province;
use Illuminate\Http\Request;

class VilleController extends Controller
{
    public function index()
    {
        $villes=Ville::all();
        $provinces=Province::all();
        return view('ville.ville',compact('villes','provinces'));
    }
    public function store(Request $request)
    {
        $create_ville=new Ville();
        $create_ville->name=$request->name;
        $create_ville->code=$request->code;
        $create_ville->province_id=$request->province_id;
        $create_ville->save();
        return redirect()->route('ville');
    }
    public function edit($id)
    {
        $villes=Ville::find($id);
        $provinces=Province::all();
        return view('ville.editville',compact('villes','provinces'));
    }
    public function update(Request $request,$id)
    {
        $villes=Ville::find($id);
        $villes->name=$request->input('name');
        $villes->code=$request->input('code');
        $villes->province_id=$request->input('province_id');
        $villes->save();
        return  redirect()->route('ville');
    }
    public function remove($id)
    {
        $villes=Ville::find($id);
        $villes->delete();
        return redirect()->route('ville');
    }

     /**
     * @OA\Get(
     *      path="/villes/province/{id}",
     *      operationId="apiGetByProvince",
     *      tags={"Villes_Province_Id"},
     *      summary="affiche la liste des villes rattachées à une province",
     *      description="renvoit toutes les villes d'une province donnée par son id",
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
    public function apiGetByProvince($provinceId){
        $province = Province::find($provinceId);
        $province->villes;
        $ville=$province->villes;
        return $ville;
    }

}
