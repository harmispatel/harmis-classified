<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\role_permissions;

class Permission extends Model
{
    use HasFactory;

    public function AddPermission()
    {
        return $this->belongsToMany(Role::class);
    }
}
