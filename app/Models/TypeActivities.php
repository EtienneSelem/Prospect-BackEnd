<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeActivities extends MyModel
{
    use HasFactory;
     protected $fillable = ['id','name'];
}
