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
                            <h3 class="card-title">Edit Blog</h3>
                        </div>
                        <form action="{{route('blogs.update',$blog->id)}}" id="quickForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="card-body">
                                <input type="hidden" name="id" value="{{$blog->id}}">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{$blog->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Description</label>
                                    <textarea name="description" class="form-control" id="summernote" cols="30" rows="10">{{$blog->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                                <img width="85px" src="{{ (file_exists(public_path('blog_image/'.$blog->image)) && !empty($blog->image)) ? asset('public/blog_image/'.$blog->image) : asset('public/blog_image/pronotfound.jpg') }}" alt="">
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Back</a>
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

@section('js')
    <script>
        $('#summernote').summernote({
            height: 300,
            placeholder: 'Property Description...',
        });
    </script>    
@endsection
