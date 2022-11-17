@foreach ($listOfProperty as $key => $property)
                        {{-- {{ asset('public/mainImage/'.$property->image) }} --}}
                        {{-- <img src="https://harmistechnology.com/harmis-classified/public/mainImage/'+ feature.image +'"> --}}
                            <div class="property_list_inr_box">
                                <div id="property{{$property->id}}" class="property_detail_inr_info" onclick="myClick({{ $key }});">
                                    <div class="property_list_inr_box_img">
                                        <div class="property_list_img">
                                            <a href="javascript:void(0)" class="img_inr">
                                                    <img src="{{ 'MainImage/' . $property->image }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="property_list_inr_box_info">
                                        <div class="property_detail" >
                                            <div class="sl-item highlighted">
                                                <div class="property_name">
                                                    <h2>{{ $property->name }}</h2>
                                                </div>
                                                <div class="property_detail_inr">
                                                    <span>{{ __('BedRooms') }}:-{{ $property->bedroom }}</span>
                                                </div>
                                                <div class="property_detail_inr">
                                                    <span>{{ __('Floor') }}:-{{ $property->floor }}</span>
                                                </div>
                                                <div class="property_detail_inr">
                                                    <span>{{ __('Addres') }}:-</span><span
                                                        onclick="myClick({{ $key }});">{{ $property->address }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
