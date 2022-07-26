<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = [
        'name',
        'status'
    ];
    public $timestamps = true;

    use HasFactory;
}
