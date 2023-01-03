<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
use Illuminate\Http\Request;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $res = null;

    public function index()
    {
        $prospects = Prospect::all();
        return view('prospects.prospects', compact('prospects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Prospect::create([
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
            'offer_id' => $request->offer,
            'state' => $request->state,
            'pieces_jointes_id' => $request->pieces_jointes_id,
            'remote_id' => $request->remote_id,
        ]);
        return back();
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $this ->res = $id;
        session(['id' =>$id]);
        $prospect = Prospect::find($id);
        Prospect::where('id', $id)->update([
            'visualizate' =>'oui',
        ]);
        return view('prospects.prospect', compact('prospect'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function edit(Prospect $prospect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prospect $prospect)
    {
        Prospect::where('id', $request->prospect_id)->update([
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prospect $prospect)
    {
        //
    }
    public function statusAttente(){
        $prospects = Prospect::where('state', '1')->get();
        $title = "Prospects en attente";

        return view('prospects.prospects', compact('prospects', 'title'));
        return view('prospects.prospect', compact('prospects', 'title'));
    }

    public function statusValide(){
        $prospects = Prospect::where('state', '2')->get();
        $title = "Prospects validés";

        return view('prospects.prospects', compact('prospects', 'title'));
        return view('prospects.prospect', compact('prospects', 'title'));
    }

    public function statusRejete(){
        $prospects = Prospect::where('state', '3')->get();
        $title = "Prospects rejetés";

        Prospect::where('id', session('id'))->update([
            'visualizate' =>'non',
        ]);

        // echo ('hello + '.session('id'));

        return view('prospects.prospects', compact('prospects', 'title'));
        return view('prospects.prospect', compact('prospects', 'title'));
    }

    public function operationprospect($id, $status)
    {
        $prospect = Prospect::where('id', $id)->update([
            'state' => $status,
        ]);

        if ($prospect == 1) {
            if ($status == '1') {
                return redirect()->route('prospect.attente');
            } elseif ($status == '2') {
                return redirect()->route('prospect.valider');
            } elseif ($status == '3') {
                return redirect()->route('prospect.rejeter');
            }
        } else {
            return back();
        }
    }

    public function visualizeProspect(Request $request){
        echo('danger');
    }
}
