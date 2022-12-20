@extends('common.layout')

@section('title', 'List Labels')

@section('content')

<div class="content-wrapper">
    <div style="padding-top:25px">
        <div class="text-right mr-3 mb-2">
            <a href="{{ route('labels.create') }}" class="btn btn-primary">Add Labels</a>
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
                                <h3 class="card-title">List Labels</h3>
                            </div>

                            <div class="card-body">
                                <table class="table table-striped table-hover" id="lableTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($labels as $label)
                                            <tr>
                                                <td>{{ $label['name'] }}</td>
                                                <td>
                                                    <span class="{{ $label['status'] == 0 ? 'badge badge-danger' : 'badge badge-success' }}">
                                                        {{ $label['status'] == 0 ? 'Inactive' : 'Active' }}
                                                    </span>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('labels.edit', encrypt($label->id)) }}" title="Edit" class="mr-2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <i class="fa fa-trash text-danger deleteBtn" data-bs-toggle="modal" style="cursor: pointer;" data-bs-target="#deletaModal" data-target-id="{{ route('labels.destroy', encrypt($label->id)) }}" title="Delete"></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Modal -->
                                <div class="modal fade" id="deletaModal" tabindex="-1" role="dialog" aria-labelledby="deletaModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deletaModalLabel">Delete labels</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete this label?
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
<script>
    $(document).ready(function () {
        $('#lableTable').DataTable();


        // delete lable
        $(".deleteBtn").click(function () {
            var url = $(this).attr("data-target-id")
            $("#deleteForm").attr('action', url)
        });
    });

</script>
@endsection
