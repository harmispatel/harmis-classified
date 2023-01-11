{{--
    THIS IS CREATE PROOERTIES PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    createProperties.blade.php

    Only Agent Can Proerty Create.
    It Displayed Create New Property Form.
    ----------------------------------------------------------------------------------------------
--}}


@extends('frontend.common.layout')

@section('title', 'Blog')
@php
    // Import Carbon
    use Carbon\Carbon;
@endphp

@section('content')
<nav aria-label="breadcrumb" class="pt-2">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('showProperty') }}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('allblogs') }}">{{__('All Blogs')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Blog')}}</li>
      </ol>
    </div>
  </nav>  
<section class="blog_detail_main">
    <div class="container"> 
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="blog_detail_inr">
                    <div class="blog_detail_title">
                        <h2>{{ $blog->title }}</h2>
                        <div class="blog_detail_title_inr">
                            <span><i class="fa-solid fa-calendar-days"></i>{{Carbon::parse($blog['created_at'])->diffForHumans()}}</span>
                            <span><i class="fa-solid fa-eye"></i>{{ $blog->view }}</span> 
                        </div>
                    </div>
                    <div class="blog_img mb-3">
                        <img src="{{ (file_exists(public_path('blog_image/'.$blog->image)) && !empty($blog->image)) ? asset('public/blog_image/'.$blog->image) : asset('public/blog_image/imgnotfound.png') }}" class="w-100" />
                    </div>
                    <div class="blog_detail_info">
                        <p>{!! $blog->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
