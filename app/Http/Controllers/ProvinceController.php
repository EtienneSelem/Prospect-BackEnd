<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
     /**
     * @OA\Get(
     *      path="/provinces",
     *      operationId="getAllProvices",
     *      tags={"Provinces"},
     *      summary="Affiche Liste De Provinces",
     *      description="Renvoit toutes Provinces",
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
    public function apiGetAll(){
        return Province::all();
    }
    public function index()
    {

        $provinces=Province::all();
        return view('province.province', compact('provinces'));
    }

    public function store(Request $request)
    {
        $create_province=new Province();
        $create_province->name=$request->name;
        $create_province->code=$request->code;
        $create_province->save();
        return back();
    }
    public function edit($id)
    {
        // dd('hello');
        $provinces=Province::find($id);
        return view('province.edit',compact('provinces'));
    }
    public function update(Request $request,$id)
    {
        $provinces=Province::find($id);
        $provinces->name=$request->name;
        $provinces->code=$request->code;
        $provinces->save();
        return redirect()->route('province');
    }
    public function remove($id)
    {

        $provinces=Province::find($id);
        $provinces->delete();
        return redirect()->route('province');
    }



}
