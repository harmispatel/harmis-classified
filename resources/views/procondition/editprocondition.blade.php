{{--
    THIS IS CREATE CATEGORY PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    editprocondition.blade.php
    It Displayed Add/Create Category Form/Page.
    ----------------------------------------------------------------------------------------------
--}}

@extends('common.layout')

@section('title', 'Add Amenities')

@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary my-4">
                            <div class="card-header">
                                <h3 class="card-title">Add Amenities</h3>
                            </div>
                            <form action="{{ route('propertycondition.update',$procondition->id) }}" id="quickForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputName">Name</label>
                                        <input type="text" name="name" value="{{ $procondition->name }}" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('propertycondition.index') }}" class="btn btn-secondary">Back</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="col-md-6">

                    </div> --}}
                </div>
            </div>
        </section>
    </div>

@endsection
