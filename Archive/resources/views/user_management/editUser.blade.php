@extends('common.layout')

@section('title', 'Edit Users')

@section('content')

<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary my-4">
              <div class="card-header">
                <h3 class="card-title">Edit Users</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form action="{{route('show_user.update',$editUserData->id)}}" id="quickForm" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="hidden" name="id" value="{{$editUserData->id}}">
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{$editUserData->name}}" placeholder="Enter Name">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputImage">Image</label>
                    <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" placeholder="Enter Name">
                    <img src="{{ url('public/userimage/'.$editUserData->image) }}" style="height: 100px; width: 100px; margin-top: 20px;">
                    @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail">Email</label>
                    <input type="email" name="email" class="form-control" value="{{$editUserData->email}}" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputGender">Gender</label>
                    <div class="form-check">
                        <label class="form-check-label" for="radio1">
                          <input type="radio" class="form-check-input" id="radio1" name="gender" value="Female" {{ $editUserData->gender == 'Female' ? 'checked' : '' }} >Female <br>
                          <input type="radio" class="form-check-input" id="radio1" name="gender" value="Male" {{ $editUserData->gender == 'Male' ? 'checked' : '' }} >Male
                        </label>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputMobile">Mobile</label>
                    <input type="text" name="mobile" class="form-control" value="{{$editUserData->mobile}}" placeholder="Enter Mobile">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputStatus">Role</label>
                    <select class="form-control" name="role">
                        @foreach ($roleIdData as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword">Password</label>
                    <input type="password" name="password" class="form-control" value="{{$editUserData->password}}" placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputStatus">Status</label>
                    <select class="form-control" name="status">
                        <option {{ ($editUserData->status) == '1' ? 'selected' : '' }} value="1">Active</option>
                        <option {{ ($editUserData->status) == '0' ? 'selected' : '' }}  value="0">InActive</option>

                      </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('show_user.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
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
