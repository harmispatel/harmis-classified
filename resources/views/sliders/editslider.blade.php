{{--
    THIS IS EDIT CATEGORY PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    editCategory.blade.php
    It Displayed Edit/Update Category Form/Page With Selected Category Data.
    ----------------------------------------------------------------------------------------------
--}}

@extends('common.layout')

@section('title', 'Edit Categpries')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (session()->has('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session()->get('error') }}
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="card card-primary my-4">
                        <div class="card-header">
                            <h3 class="card-title">Edit Categpries</h3>
                        </div>
                        <form action="{{route('sliders.update',$slider->id)}}" id="quickForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="card-body">
                                <input type="hidden" name="id" value="{{$slider->id}}">
                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$slider->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea name="description" class="form-control" id="desc" cols="30" rows="10">{{$slider->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                                <img width="85px" src="{{ (file_exists(public_path('slider_image/'.$slider->image)) && !empty($slider->image)) ? asset('public/slider_image/'.$slider->image) : asset('public/slider_image/pronotfound.jpg') }}" alt="">
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('sliders.index') }}" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
