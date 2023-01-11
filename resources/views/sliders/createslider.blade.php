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
                    <h3 class="card-title">Add Slider</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="{{route('sliders.store')}}" id="quickForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea id="desc" class="form-control" name="description" cols="30" rows="10">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('sliders.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>

@endsection
