@extends('common.layout')

@section('title', 'List Users')

@section('content')

  <div class="content-wrapper">
    <div style="padding-top: 25px">
        <div class="text-right mr-3 mb-2">
            @php
             $empty_array = array();
                // echo "<pre>";
                //     print_r($rolePermission);exit;
            @endphp
            @foreach ($rolePermission as $permission)
                    @php
                        $userPermission = $permission->permission_id;
                        $permissionQuery = getPermissionValue($userPermission);
                        $empty_array =$permissionQuery->name;
                    @endphp

            {{-- @php
                exit;
            @endphp --}}
                {{-- @if ($permissionQuery->name == 'Add User')
                @endif --}}

                @endforeach
                <a href="{{route('show_user.create')}}" class="btn btn-primary">Add Users</a>

            {{-- @php
                print_r($empty_array);
            @endphp --}}


        </div>
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Users</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th class="text-center">Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($showUserData as $userData)
                        <tr>
                            <td class="text-center">
                                <img src="{{ url('/UserImage/'.$userData->image) }}" style="height: 100px">
                            </td>
                            <td>{{$userData['name']}}</td>
                            <td>{{$userData['email']}}</td>
                            <td>{{$userData['gender']}}</td>
                            <td>{{$userData['mobile']}}</td>
                            <td>{{$userData->hasOneRole['name']}}</td>
                            <td>
                                <span class="{{ $userData['status'] == 0 ? 'badge badge-danger' : 'badge badge-success' }}">
                                    {{ $userData['status'] == 0 ? 'Inactive' : 'Active' }}
                                </span>
                            </td>
                            <td class="text-right">

                                    <a href="{{ route('show_user.edit',$userData->id) }}" class="mr-2" title="Edit"><i class="fas fa-edit"></i></a>
                                <i class="fa fa-trash text-danger deleteBtn" data-toggle="modal" style="cursor: pointer;" data-target="#exampleModal" data-target-id="{{ route('show_user.destroy',$userData->id) }}" title="Delete"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>

                    {{-- model --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure to delete this user?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="" id="deleteForm" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- model --}}
                </div>
                </div>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
                integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(".deleteBtn").click(function(){
                var url = $(this).attr("data-target-id")
                $("#deleteForm").attr('action',url)
            });
        </script>
    </div>
  </div>

  @endsection
