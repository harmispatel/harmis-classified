<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCondition extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'property_conditions';
}
