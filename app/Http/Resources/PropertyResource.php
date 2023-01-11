<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $multiple_images = (isset($this->multiImage) && !empty($this->multiImage)) ? explode(',',$this->multiImage) : '';
        $multiple_images[] = $this->image;
        
        return [
            'id'                  => $this->id,
            'slug'                => $this->slug,
            'name'                => $this->name,
            'user_id'             => $this->user_id,
            'user'                => $this->hasOneUser->name,
            'mobile'              => $this->hasOneUser->mobile,
            'email'               => $this->hasOneUser->email,
            'category_id'         => $this->category_id,
            'category'            => $this->hasOneCategory->name,
            'price'               => $this->price,
            'property_type'       => $this->property_type,
            'bedroom'             => $this->bedroom,
            'bath'                => $this->bath,
            'garage'              => $this->garage,
            'kitchen'             => $this->kitchen,
            'property_condition'  => $this->property_condition,
            'floor'               => $this->floor,
            'building_year'       => $this->building_year,
            'building_area'       => $this->building_area,
            'description'         => $this->description,
            'state_id'            => $this->state_id,
            'state'               => $this->hasOneState->name,
            'country_id'          => $this->country_id,
            'country'             => $this->hasOneCountry->name,
            'address'             => $this->address,
            'latitude'            => $this->latitude,
            'longitude'           => $this->longitude,
            'image'               => $multiple_images
        ];
    }
}
