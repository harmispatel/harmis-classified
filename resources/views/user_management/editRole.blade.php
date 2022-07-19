@extends('common.layout')

@section('title', 'Edit Roles')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="card card-primary my-4">
                <div class="card-header">
                <h3 class="card-title">Edit Roles</h3>
                </div>
                <form action="{{route('show_role.update',$editRoleData->id)}}" id="quickForm" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{$editRoleData->id}}">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$editRoleData->name}}">
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
                            <label for="exampleInputStatus">Status</label>
                            <select class="form-control" name="status">
                                <option {{ ($editRoleData->status) == '1' ? 'selected' : '' }} value="1">Active</option>
                                <option {{ ($editRoleData->status) == '0' ? 'selected' : '' }}  value="0">InActive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputStatus">Permission</label>
                            <select class="form-control" name="permission[]" multiple>
                                @foreach ($permission as $key => $permissionValue)
                                    <option value="{{$key}}"
                                        {{ in_array($key, $permissionId->toArray()) ? 'selected' : '' }}>
                                        {{$permissionValue}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('show_role.index') }}" class="btn btn-secondary">Back</a>
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
