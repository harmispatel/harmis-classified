{{--
    THIS IS CREATE CATEGORY PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    editamenities.blade.php
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
                            <form action="{{ route('amenities.update',$amenities->id) }}" id="quickForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputName">Name</label>
                                        <input type="text" name="name" value="{{ $amenities->name }}" class="form-control" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Icon</label>
                                        <input type="file" name="icon" accept="image/*" class="form-control" placeholder="Selecr Icon">
                                    </div>
                                    <img src="{{ asset('public/amenities_icon/'. $amenities->icon) }}" width="50px" alt="">
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('amenities.index') }}" class="btn btn-secondary">Back</a>
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
