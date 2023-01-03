<?php

namespace App\Models;

use App\Models\Zone;
use App\Models\MyModel;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ville extends MyModel
{
    use HasFactory;
    protected $fillable=['name','code','province_id'];
    public function province(){
        return $this->belongsTo(Province::class);
    }
    public function zones()
    {
        return $this->hasMany(Zone::class);
    }
}
