<?php

namespace App\Models;

use App\Models\Ville;
use App\Models\MyModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends MyModel
{
    use HasFactory;
    protected $fillable = ['id','name','code'];
    
     public function villes()
    {
        return $this->hasMany(Ville::class);
    }
}
