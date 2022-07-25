@extends('common.layout')

@section('title', 'List Propertys')

@section('content')

  <div class="content-wrapper">
    <div style="padding-top: 25px">
        <div class="text-right mr-3 mb-2">
            <a href="{{route('propertie.create')}}" class="btn btn-primary">Add Propertys</a>
        </div>
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Property</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>country</th>
                        <th>State</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($showPropertiesData as $propertiesData)
                        <tr>
                            <td>{{$propertiesData['name']}}</td>
                            <td>{{$propertiesData->hasOneCategory['name']}}</td>
                            <td>{{$propertiesData['price']}}</td>
                            <td>{{$propertiesData->hasOneCountry['name']}}</td>
                            <td>{{$propertiesData->haseOneState['name']}}</td>
                            <td>{{$propertiesData['address']}}</td>
                            <td>
                                <span class="{{ $propertiesData['status'] == 0 ? 'badge badge-danger' : 'badge badge-success' }}">
                                    {{ $propertiesData['status'] == 0 ? 'Inactive' : 'Active' }}
                                </span>
                            </td>
                            <td class="text-right">

                                    <a href="{{ route('propertie.edit',$propertiesData->id) }}" class="mr-2" title="Edit"><i class="fas fa-edit"></i></a>
                                <i class="fa fa-trash text-danger" data-toggle="modal" style="cursor: pointer;" data-target="#exampleModal" title="Delete"></i>
                            </td>
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
                                            <form action="{{ route('propertie.destroy', $propertiesData->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- model --}}
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

    </div>
  </div>

  @endsection
