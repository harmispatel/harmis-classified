<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use App\Models\role_permissions;


class Role extends Model
{
    use HasFactory;
    protected $table ='roles';
    protected $guarded = [];

    public function addRole()
    {
        return $this->belongsToMany(Permission::class);
    }
}
