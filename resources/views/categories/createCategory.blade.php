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
                    <h3 class="card-title">Add Categories</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="{{route('category.store')}}" id="quickForm" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Name:-</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name">
                            @if ($errors->any())
                                <div class="text-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Amenities</label>
                            <select class="select2 form-control" name="amenities[]" multiple="multiple">
                                @foreach ($amenities as $amenity)
                                    <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Property Condition</label>
                            <select class="select2 form-control" name="procondition[]" multiple="multiple">
                                @foreach ($procondition as $condition)
                                    <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputStatus">Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('category.index') }}" class="btn btn-secondary">Back</a>
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

@section('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>    
@endsection
