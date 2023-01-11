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
                <a href="{{route('blogs.create')}}" class="btn btn-primary">Add Blog</a>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @if (session()->has('success'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    {{ session()->get('success') }}
                                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session()->get('error') }}
                                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List Blog</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-striped" id="blogTable">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                {{-- <th>Description</th> --}}
                                                <th>Created Date</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($blogs as $blog)
                                                <tr>
                                                    <td>{{$blog->title}}</td>
                                                    {{-- <td>{{ substr(strip_tags($blog->description),0,40) }}...</td> --}}
                                                    {{-- <td><img width="85px" src="{{ (file_exists(public_path('blog_image/'.$blog->image)) && !empty($blog->image)) ? asset('public/blog_image/'.$blog->image) : asset('public/blog_image/pronotfound.jpg') }}" alt=""></td> --}}
                                                    <td>{{ $blog->created_at }}</td>
                                                    <td class="text-right">
                                                        <a href="{{ route('blogs.edit',$blog->id) }}" title="Edit" class="mr-2"><i class="fas fa-edit"></i></a>
                                                        <i class="fa fa-trash text-danger deleteBtn" data-toggle="modal" style="cursor: pointer;" data-target="#exampleModal" data-target-id="{{ route('blogs.destroy',$blog->id) }}" title="Delete"></i>
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
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(".deleteBtn").click(function(){
            var url = $(this).attr("data-target-id")
            $("#deleteForm").attr('action',url)
        });
    </script>
    <script>
        $(document).ready( function () {
            $('#blogTable').DataTable();
        });
    </script>
@endsection
