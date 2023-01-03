<?php

namespace App\Models;

use App\Models\Commune;
use App\Models\MyModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zone extends MyModel
{
    use HasFactory;
    protected $fillable=['name','code','ville_id'];
    
    public function ville(){
        return $this->belongsTo(Ville::class);
    }
    public function communes()
    {
        return $this->hasMany(Commune::class);
    }
}
