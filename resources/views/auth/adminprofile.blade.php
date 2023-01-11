{{--
    THIS IS CREATE USER PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    createUser.blade.php
    It Displayed Create New User Form
    ----------------------------------------------------------------------------------------------
--}}

@extends('common.layout')

@section('title', 'Add Users')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary my-4">
                        <div class="card-header">
                            <h3 class="card-title">Add Users</h3>
                        </div>
                        <form action="{{route('show_user.update',$admindetail->id)}}" id="quickForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" name="name" value="{{ $admindetail->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Enter Name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Email</label>
                                <input type="email" name="email" value="{{ $admindetail->email }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Enter Email">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputImage">Image</label>
                                <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" placeholder="Enter Name">
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                                @if (!empty($admindetail->image))
                                    <img width="100" src="{{ asset('public/userimage/'.$admindetail->image) }}" alt="Img">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputGender">Gender</label>
                                <div class="form-check">
                                    <label class="form-check-label" for="radio1">
                                    <input type="radio" class="form-check-input {{ $errors->has('gender') ? 'is-invalid' : '' }}" id="radio1" {{ ($admindetail->gender == 'Female') ? 'checked' : '' }} name="gender" value="Female">Female <br>
                                    <input type="radio" class="form-check-input {{ $errors->has('gender') ? 'is-invalid' : '' }}" id="radio1" {{ ($admindetail->gender == 'Male') ? 'checked' : '' }} name="gender" value="Male">Male
                                    </label><br>
                                </div>
                                @if ($errors->has('gender'))
                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMobile">Mobile</label>
                                <input type="text" name="mobile" class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" value="{{ $admindetail->mobile }}" placeholder="Enter Mobile">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputStatus">Role</label>
                                <input type="text" class="form-control" name="role_id" value="{{ ($admindetail->role_id == 1) ? "Super Admin" : '' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputStatus">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1" {{ ($admindetail->status == 1) ? "selected" : '' }}>Active</option>
                                    <option value="0" {{ ($admindetail->status == 0) ? "selected" : '' }}>InActive</option>
                                </select>
                            </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('show_user.index') }}" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
