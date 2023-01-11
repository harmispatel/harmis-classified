{{--
    THIS IS CREATE PROOERTIES PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    createProperties.blade.php

    Only Agent Can Proerty Create.
    It Displayed Create New Property Form.
    ----------------------------------------------------------------------------------------------
--}}


@extends('frontend.common.layout')

@section('title', 'Add Properties')

@section('content')  

  <nav aria-label="breadcrumb" class="pt-2">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('showProperty') }}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('allagent') }}">{{__('Agent')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Agent Detail')}}</li>
      </ol>
    </div>
  </nav>
    <section class="agent_detail_main">
      <div class="container">
        <div class="row"> 
          <div class="col-md-8">
            <div class="agent_detail_inr">
              <div class="row">
                <div class="col-md-4">
                  <div class="agent_img">
                    <img src="{{ (file_exists(public_path('userimage/'.$agent->image)) && !empty($agent->image)) ? asset('public/userimage/'.$agent->image) : asset('public/multiImage/pronotfound.jpg') }}" class="w-100"/>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="agent_info">
                    <h2>{{ $agent->name }}</h2>
                    <div class="agent_detail_info_inr">
                      <ul>
                        <li>
                          <span><i class="fa-solid fa-phone"></i></span>
                          <h3>{{$agent->mobile}}</h3>
                        </li>
                        <li>
                          <span><i class="fa-solid fa-envelope"></i></span>
                          <h3>{{ $agent->email }}</h3>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="agent_contact_info">
              <div class="row">
                <form action="{{ route('agentContact') }}" method="POST">
                  @csrf
                  <div class="col-md-12">
                    <div class="from-group">
                      <input type="hidden" name="toemail" value="{{ $agent->email }}">
                      <label for="name" class="form-label">Your Name</label>
                      <div class="position-relative">
                        <input type="text" class="form-control" name="name" placeholder="Enter Your Name" id="name">
                        <i class="fa-solid fa-user input_ic"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="from-group">
                      <label for="number" class="form-label">Your Mobile No.</label>
                      <div class="position-relative">
                        <input type="text" class="form-control" name="mobile" placeholder="Enter Your Number" id="number">
                        <i class="fa-solid fa-phone input_ic"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="from-group">
                      <label for="email" class="form-label">Your Email</label>
                      <div class="position-relative">
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email" id="email">
                        <i class="fa-solid fa-envelope input_ic"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="from-group">
                      <label for="message" class="form-label">Your message</label>
                      <div class="position-relative">
                        <textarea class="form-control" name="message" placeholder="Enter Your Message" id="message" rows="3"></textarea>
                        <i class="fa-solid fa-message input_ic"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="from-group">
                      <button class="btn agent_sb_bt">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="agent-property">
        <div class="container">
            <div class="row">
                @foreach ($agent->properties as $property)
                    <div class="col-md-6">
                        <div class="property-inr-list-item">
                            <div class="property_inr-list-img">
                                <a href="javascript:void(0)" onclick="#" class="img_inr">
                                    <img src="{{ (file_exists(public_path('multiImage/'.$property->image)) && !empty($property->image)) ? asset('public/multiImage/'.$property->image) : asset('public/multiImage/pronotfound.jpg') }}" class="w-100"/>
                                </a>
                                @if($property["property_type"] == 1)
                                    <div class="type-tag">{{__("For     Rent")}}</div>
                                @elseif($property["property_type"] == 2)
                                    <div class="type-tag">{{__("For Sales")}}</div>
                                @else
                                        {{ "" }}
                                @endif
                                </div>
                                <div class="property-inr-list-content">
                                <h2>{{$property->name}}</h2>
                                <p>{{$property->address}}</p>
                                <div class="property-inr-list-tag">
                                    {{-- {{ ($property->bedroom != 0 && !empty($property->bedroom)) ? '<span class="badge rounded-pill bg-light-green">'.$property->bedroom. ' '.__("Bedrooms").'</span>' : ""}}
                                    {{ ($property->bath != 0 && !empty($property->bath)) ? '<span class="badge rounded-pill bg-light-orange">'.$property->bath. ' ' .__("Bathrooms").'</span>' : }}
                                    {{ ($property->building_area != 0 && !empty($property->building_area)) ?  '<span class="badge rounded-pill bg-light-yellow">'.$property->building_area . ' '.__("Sq.ft").'</span>' : ""}}
                                    {{ ($property->garage != 0 && !empty($property->garage)) ?  '<span class="badge rounded-pill bg-light-blue">'.$property->garage . ' ' .__("Garage").'</span>' : ""}} --}}
                                </div>
                                <div class="property-inr-price-category-tag">
                                    <div class="price-tag">$  {{$property->price}}</div>
                                </div>
                                <a href="{{ route('propertyDetails',$property->slug)}}" class="btn btn-sm btn-primary mt-2">{{ __("View Property")}}</a>
                            </div>
                        </div>
                    </div>       
                @endforeach
            </div>
        </div>
    </section>

@endsection
