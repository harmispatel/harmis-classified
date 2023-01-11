{{--
    THIS IS CREATE CATEGORY PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    createCategory.blade.php
    It Displayed Add/Create Category Form/Page.
    ----------------------------------------------------------------------------------------------
--}}

@extends('common.layout')

@section('title', 'Add Categories')

@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary my-4">
                        <div class="card-header">
                        <h3 class="card-title">Add Blog</h3>
                        </div>
                        <form action="{{route('blogs.store')}}" id="quickForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Enter Blog Title">
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Description</label>
                                    <textarea id="summernote" class="form-control" name="description" cols="30" rows="10">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    </div>
                    <div class="col-md-6">

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
