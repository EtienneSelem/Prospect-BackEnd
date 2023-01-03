<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Zone;
use App\Models\Offre;
use App\Models\Commune;
use App\Models\Prospect;
use App\Models\Province;
use App\Models\TypeActivities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProspectResource;

class MapController extends Controller
{
    public function index(Request $request)
    {
       $provinces = Province::all();
        $typeActivities =TypeActivities::all();
        $offres = Offre:: all();
       // $users = User::all();

        $agents = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('roles.name', 'agent')
            ->select('users.*')
            ->get();

        $agent = $request->agent??[];
        $type = $request->type??[];
        $offre = $request->offre??[];
        $province = $request->province??null;
        $ville= $request->ville??null;
        $zone = $request->zone??null;
        $commune = $request->commune??null;
        //verification des elements dans la base de données
        if($agent or $type or $offre or $province or $ville or $zone or $commune)
        {
            $t= false;
            $query = "";
            if($agent){
                if(!$t){
                    $query = Prospect::whereIn('agent_id', $agent);
                    $t=true;
                }else{
                    $query = $query->whereIn('agent_id', $agent);
                }
            }
            if($type){
                if(!$t){
                    $query = Prospect::whereIn('type_activities_id', $type);
                    $t=true;
                }else{
                    $query = $query->whereIn('type_activities_id', $type);
                }
            }
            if($offre){
                if(!$t){
                    $query = Prospect::whereIn('offer_id', $offre);
                    $t=true;
                }else{
                    $query = $query->whereIn('offer_id', $offre);
                }
            }
            if($province){
                if(!$t){
                    $query = Prospect::where('province_id', $province);
                    $t=true;
                }else{
                    $query = $query->where('province_id', $province);
                }
            }
            if($ville){
                if(!$t){
                    $query = Prospect::where('ville_id', $ville);
                    $t=true;
                }else{
                    $query = $query->where('ville_id', $ville);
                }
            }
            if($zone){
                if(!$t){
                    $query = Prospect::where('zone_id', $zone);
                    $t=true;
                }else{
                    $query = $query->where('zone_id', $zone);
                }
            }
            if($commune){
                if(!$t){
                    $query = Prospect::where('commune_id', $commune);
                    $t=true;
                }else{
                    $query = $query->where('commune_id', $commune);
                }
            }

            $prospects = $query->get();
        }
        else {
            $prospects = Prospect::all();
        }
        $prospects =json_encode(ProspectResource::getListInstance($prospects));

        return view('map', compact("provinces","typeActivities","offres","agents","prospects","agent", "type", "offre", "province", "ville", "zone", "commune"));
    }
    public function province(){
    }
    public function villes($id){
        $villes = Province::findOrFail($id)->villes;
        return $villes;

    }
    public function zones($id){
        $zones = Zone::where("ville_id", $id)->get();
        return $zones;

    }
    public function communes($id){
        $communes = Commune::where("zone_id", $id)->get();
        return $communes;

    }
    public function filtre(Request $request){

       $agent = $request->agent??null;
       $type = $request->type??null;
       $offre = $request->offre??null;
       $province = $request->province??null;
       $ville= $request->ville??null;
       $zone = $request->zone??null;
       $commune = $request->commune??null;

        if($agent){
                if(!$t){
                    $query = Prospect::whereIn('agent_id', $agent);
                    $t=true;
                }else{
                    $query = $query->whereIn('agent_id', $agent);
                }
            }
            if($type){
                if(!$t){
                    $query = Prospect::whereIn('type_activities_id', $type);
                    $t=true;
                }else{
                    $query = $query->whereIn('type_activities_id', $type);
                }
            }

            if($offre){
                if(!$t){
                    $query = Prospect::whereIn('offer_id', $offre);
                    $t=true;
                }else{
                    $query = $query->whereIn('offer_id', $offre);
                }
            }
            if($province){
                if(!$t){
                    $query = Prospect::where('province_id', $province);
                    $t=true;
                }else{
                    $query = $query->where('province_id', $province);
                }
            }
            if($ville){
                if(!$t){
                    $query = Prospect::where('ville_id', $ville);
                    $t=true;
                }else{
                    $query = $query->where('ville_id', $ville);
                }
            }
            if($zone){
                if(!$t){
                    $query = Prospect::where('zone_id', $zone);
                    $t=true;
                }else{
                    $query = $query->where('zone_id', $zone);
                }
            }
            if($commune){
                if(!$t){
                    $query = Prospect::where('commune_id', $commune);
                    $t=true;
                }else{
                    $query = $query->where('commune_id', $commune);
                }
            }

       $requete_all = array_merge($requete_commune,$requete_ville, $requete_zone, $requete_province);
       $query1 = implode(' and ', $requete_all);
       $requeteIn = array_merge($requete_agent, $requete_offre,$requete_type);
       $query2 = implode(' and ', $requeteIn);
       $tb_query = [];
       if($query1 != null){
        $tb_query[] = $query1;
       }

        if($query2 != null){
        $tb_query[] = $query2;
       }

        $query = implode(' and ', $tb_query);
        if(trim($query) != null & trim($query) != 'and' ){
             $filtre = DB::select('select * FROM prospects WHERE '.$query);
       return $filtre;

        }

        else {
        $requete = DB::table('prospects')
       ->get();
       return $requete;
       }



    }
}
