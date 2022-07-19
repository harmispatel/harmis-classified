<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\State;
use App\Models\Category;

class Property extends Model
{
    use HasFactory;
    protected $table = "properties";
    protected $guarded = [];

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
