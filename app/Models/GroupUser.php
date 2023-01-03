<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'group_id',
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function groups(){
        return $this->belongsTo(Group::class);
    }
}
