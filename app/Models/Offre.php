<?php

namespace App\Models;

use App\Models\MyModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offre extends MyModel
{
    use HasFactory;
    protected $fillable = ['id','name','code'];
}
