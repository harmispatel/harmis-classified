{{--
    THIS IS CREATE PROOERTIES PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    allblogs.blade.php

    Only Agent Can Proerty Create.
    It Displayed Create New Property Form.
    ----------------------------------------------------------------------------------------------
--}}


@extends('frontend.common.layout')

@section('title', 'Blogs')
@php
    // Import Carbon
    use Carbon\Carbon;
@endphp

@section('content')  
<nav aria-label="breadcrumb" class="pt-2">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('showProperty') }}">{{__('HOME')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Blogs')}}</li>
      </ol>
    </div>
  </nav>
    @if (count($blogs) > 0)
        <section class="property_sec blog_sec blog_list_main">
            <div class="container">
                <div class="section_title">
                    <h2>{{__('Our Property Blog')}}</h2>
                </div>
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-md-4">
                            <div class="blog_post">
                                <a href="{{ route('showblog',Crypt::encrypt($blog->id)) }}">
                                    <div class="blog_post_img">
                                        <img src="{{ (file_exists(public_path('blog_image/'.$blog->image)) && !empty($blog->image)) ? asset('public/blog_image/'.$blog->image) : asset('public/blog_image/imgnotfound.png') }}" class="w-100"/>
                                    </div>
                                    <div class="blog_info">
                                        <h2>{{ $blog->title }}</h2>
                                        <div class="blog_info_inr">
                                            <div class="blog_date">  
                                                <label><i class="fa-solid fa-calendar-days"></i> <span>{{Carbon::parse($blog['created_at'])->diffForHumans()}}</span></label>
                                            </div>
                                            <div class="blog_view">
                                                <label><i class="fa-solid fa-eye"></i><span>{{ $blog->view }}</span> </label>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection