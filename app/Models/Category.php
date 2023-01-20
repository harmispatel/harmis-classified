<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = [
        'name',
        'status'
    ];
    public $timestamps = true;

    use HasFactory;

    public function amenities()
    {
        return $this->belongsToMany(amenities::class);
    }

    public function propertycondition()
    {
        return $this->belongsToMany(PropertyCondition::class);
    }

    public function category_amenities()
    {
        return $this->hasMany(AmenitiesCategory::class,'category_id','id');
    }


    public function categoryToProperty()
    {
        return $this->hasMany(Propertie::class)->groupBy('property_type');
        // return $this->hasMany(Propertie::class, 'id','category_id');
    }

    // public function amenities()
    // {
    //     return $this->hasMany(amenities::class,'id','amenities');
    // }
}
