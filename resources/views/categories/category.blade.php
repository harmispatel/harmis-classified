{{--
    THIS IS CATEGOY LIST PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    category.blade.php
    It Displayed All Categoy.
    ----------------------------------------------------------------------------------------------
--}}


@extends('common.layout')

@section('title', 'List Categories')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <div style = "padding-top:25px">
            <div class="text-right mr-3 mb-2">
                <a href="{{route('category.create')}}" class="btn btn-primary">Add Categories</a>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List Categories</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($showCategoryData as $categoryData)
                                                <tr>
                                                    <td>{{$categoryData['name']}}</td>
                                                    <td>
                                                        <span class="{{ $categoryData['status'] == 0 ? 'badge badge-danger' : 'badge badge-success' }}">
                                                            {{ $categoryData['status'] == 0 ? 'Inactive' : 'Active' }}
                                                        </span>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('category.edit',$categoryData->id) }}" title="Edit" class="mr-2"><i class="fas fa-edit"></i></a>
                                                        <i class="fa fa-trash text-danger deleteBtn" data-toggle="modal" style="cursor: pointer;" data-target="#exampleModal" data-target-id="{{ route('category.destroy',$categoryData->id) }}" title="Delete"></i>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                {{-- Model --}}
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
                                                Are you sure to delete this category?
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
