@extends('common.layout')

@section('title', 'List Language')

@section('content')

<div class="content-wrapper">
    <div style="padding-top:25px">
        <div class="text-right mr-3 mb-2">
            <a href="{{ route('languages.create') }}" class="btn btn-primary">Add Language</a>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('success'))
                            <div class="alert alert-success mt-4" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-error mt-4" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List Languages</h3>
                            </div>

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
                                        @foreach($languages as $language)
                                            <tr>
                                                <td>{{ $language['name'] }}</td>
                                                <td>
                                                    <span class="{{ $language['status'] == 0 ? 'badge badge-danger' : 'badge badge-success' }}">
                                                        {{ $language['status'] == 0 ? 'Inactive' : 'Active' }}
                                                    </span>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('languages.edit', encrypt($language->id)) }}" title="Edit" class="mr-2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <i class="fa fa-trash text-danger deleteBtn" data-toggle="modal"
                                                        style="cursor: pointer;" data-target="#exampleModal"
                                                        data-target-id="{{ route('languages.destroy', encrypt($language->id)) }}"
                                                        title="Delete">
                                                    </i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Language</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                Are you sure to delete this Language?
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
            crossorigin="anonymous" referrerpolicy="no-referrer">
        </script>

        <script>
            $(".deleteBtn").click(function () {
                var url = $(this).attr("data-target-id")
                $("#deleteForm").attr('action', url)
            });
        </script>
    </div>
</div>

@endsection
