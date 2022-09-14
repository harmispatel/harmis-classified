@extends('common.layout')

@section('title', 'Add Language')

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
                    <h3 class="card-title">Add Language</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="{{route('language.store')}}" id="quickForm" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <label for="exampleInputLanguageName">Language Name</label>
                        <input type="text" name="languageName" class="form-control" placeholder="Enter Language Name">

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
                        <a href="{{ route('language.index') }}" class="btn btn-secondary">Back</a>
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
