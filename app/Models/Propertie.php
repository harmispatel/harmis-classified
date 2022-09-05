<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Country, State};

class Propertie extends Model
{
    use HasFactory;
    protected $table = "properties";

    const USED_CONDITION = 1;

    // protected $guarded = [];
    protected $fillable = [
        'name',
        'category',
        'price',
        'country',
        'state',
        'address',
        'status',
        'property_condition',
        'floor'
    ];

    public function hasOneCountry()
    {
        return $this->hasOne(Country::class,'id','country_id');
    }
    public function haseOneState()
    {
        return $this->hasOne(State::class,'id','state_id');
    }
    public function hasOneCategory()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
