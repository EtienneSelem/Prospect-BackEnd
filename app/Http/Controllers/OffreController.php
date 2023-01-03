<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    public function index()
    {
        $offres=Offre::all();
        return view('offre.offre', compact('offres'));
    }
    public function store(Request $request)
    {
        $create_offre=new Offre();
        $create_offre->name=$request->name;
        $create_offre->code=$request->code;
        $create_offre->save();
        return back();
        return redirect('offre/');
    }
     public function edit($id)
    {
        $offres=Offre::find($id);
        return view('offre.editoffre',compact('offres'));
    }
    public function update(Request $request,$id)
    {
        $offres=Offre::find($id);
        $offres->name=$request->name;
        $offres->code=$request->code;
        $offres->save();
        return redirect()->route('offre');
    }
     public function remove($id)
    {
        $offres=Offre::find($id);
        $offres->delete();
        return redirect()->route('offre');
    }
    /**
     * @OA\Get(
     *      path="/offres",
     *      operationId="getAllOffres",
     *      tags={"Offres"},
     *      summary="affiche toutes les Offres",
     *      description="renvoit toutes les offres du prospect",
     *      @OA\Response(
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
    public function apiOffre()
    {
       return Offre::all();
    }
}
