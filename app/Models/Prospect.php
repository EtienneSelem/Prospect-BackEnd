<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;
    // protected $table = 'prospects';
    // protected $guarded = [];
    protected $fillable = [
        'longitude',
        'latitude',
        'agent_id',
        'commune_id',
        'zone_id',
        'ville_id',
        'province_id',
        'company_name',
        'company_address',
        'type_activities_id',
        'company_phone',
        'offer_id',
        'state',
        'pieces_jointes_id',
        'remote_id'
    ];

    public function agent(){
        return $this->belongsTo(User::class,'agent_id');
    }
    public function commune(){
        return $this->belongsTo(Commune::class);
    }
    public function zone(){
        return $this->belongsTo(Zone::class);
    }
    public function ville(){
        return $this->belongsTo(Ville::class);
    }
    public function province(){
        return $this->belongsTo(Province::class);
    }
    public function typeActivities(){
        return $this->belongsTo(TypeActivities::class, 'type_activities_id');
    }
    public function offer(){
        return $this->belongsTo(Offre::class);
    }
    public function piecesjointes(){
        return $this->hasMany(Pieces_Jointe::class, 'prospect_id');
    }

}
