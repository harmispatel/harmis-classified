{{--
    THIS IS AGENT LIST PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    allagent.blade.php
    It Displayed All Agent Frontside/userside Agent Page.
    ----------------------------------------------------------------------------------------------
--}}

@extends('frontend.common.layout')
<style>
    .gm-style-iw{
        width: 400px !important;
    }
</style>

@section('content')
<nav aria-label="breadcrumb" class="pt-2">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('showProperty') }}">{{__('HOME')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Agents')}}</li>
      </ol>
    </div>
  </nav>
    <section class="property_sec agent_list_main">
        <div class="container">
            <div class="section_title">
                <h2>{{__('Meet Our Agent')}}</h2>
            </div>
            <div class="agent-swiper">
                <div class="row">
                    @if (count($agents) > 0)                     
                        @foreach ($agents as $key => $agent)
                            <div class="col-md-3">
                                {{-- <a href="{{ (auth()->check()) ? route('agentdetail',Crypt::encrypt($agent->id)) : route('userLoginForm') }}" > --}}
                                <a href="{{ route('agentdetail',Crypt::encrypt($agent->id)) }}" >
                                    <div class="agent_main">
                                        <div class="agent_img">
                                            <img src="{{ (file_exists(public_path('userimage/'.$agent->image)) && !empty($agent->image)) ? asset('public/userimage/'.$agent->image) : asset('public/multiImage/pronotfound.jpg') }}" class="img-fluid w-100"/>
                                        </div>
                                        <div class="agent_info_inr">
                                            <h2>{{ $agent->name }}</h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection