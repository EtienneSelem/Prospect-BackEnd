<?php

namespace App\Models;

use App\Models\Zone;
use App\Models\MyModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commune extends MyModel
{
    use HasFactory;
    protected $fillable=['name','code','zone_id'];
    public function zone(){
        return $this->belongsTo(Zone::class);
    }
}
