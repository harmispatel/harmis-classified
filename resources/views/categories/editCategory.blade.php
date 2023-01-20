{{--
    THIS IS EDIT CATEGORY PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    editCategory.blade.php
    It Displayed Edit/Update Category Form/Page With Selected Category Data.
    ----------------------------------------------------------------------------------------------
--}}

@extends('common.layout')

@section('title', 'Edit Categpries')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="card card-primary my-4">
                <div class="card-header">
                <h3 class="card-title">Edit Categpries</h3>
                </div>
                <form action="{{route('category.update',$editCategoryData->id)}}" id="quickForm" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{$editCategoryData->id}}">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$editCategoryData->name}}">
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
                        <select class="select2 form-control" id="amenities" name="amenities[]" multiple="multiple">
                            @foreach ($amenities as $amenity)
                                <option value="{{ $amenity->id }}" {{ ($editCategoryData->amenities()->find($amenity->id)) ? 'selected' : '' }}>{{ $amenity->name }}</option>
                                {{-- {{ (in_array($editCategoryData->id,$category_amenities)) }} --}}
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Property Condition</label>
                        <select class="select2 form-control" name="procondition[]" multiple="multiple">
                            @foreach ($procondition as $condition)
                                <option value="{{ $condition->id }}" {{ ($editCategoryData->propertycondition()->find($condition->id)) ? 'selected' : '' }}>{{ $condition->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                            <label for="exampleInputStatus">Status</label>
                            <select class="form-control" name="status">
                                <option {{ ($editCategoryData->status) == '1' ? 'selected' : '' }} value="1">Active</option>
                                <option {{ ($editCategoryData->status) == '0' ? 'selected' : '' }}  value="0">InActive</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('category.index') }}" class="btn btn-secondary">Back</a>
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

@section('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>    
@endsection