{{--
    THIS IS CREATE ROLE PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    createRole.blade.php
    It Displayed Create New Role Form
    ----------------------------------------------------------------------------------------------
--}}

@extends('common.layout')

@section('title', 'Add Roles')

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
                    <h3 class="card-title">Add Roles</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="{{route('show_role.store')}}" id="quickForm" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        </div>
                        <div class="form-group">
                        <label for="exampleInputStatus">Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputStatus">Permission</label>
                        <select class="form-control" name="permission[]" multiple>
                            @foreach ($permission as $permissionValue)
                                <option value="{{$permissionValue->id}}">{{$permissionValue->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('permission'))
                            <span class="text-danger">{{ $errors->first('permission') }}</span>
                        @endif
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('show_role.index') }}" class="btn btn-secondary">Back</a>
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
