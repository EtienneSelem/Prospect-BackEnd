<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Group extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name'
    ];
    protected $guard_name = 'web';

    public function users(){
        return $this->belongsToMany(User::class, "group_users", "group_id", "user_id");
    }
}
