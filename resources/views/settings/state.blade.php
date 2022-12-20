{{--
    THIS IS STATE PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    state.blade.php
    It Displayed All State List
    ----------------------------------------------------------------------------------------------
--}}

@extends('common.layout')

@section('title', 'List Satates')

@section('content')

    <div class="content-wrapper">
        <!-- Main content -->
        <div style = "padding-top:25px">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List States</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-striped table-hover" id="countryTable">
                                        <thead>
                                            <tr>
                                                <th>State Name</th>
                                                <th>Country</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($showStateData as $stateData)
                                                <tr>
                                                    <td>{!!$stateData['name']!!}</td>
                                                    <td>{{ $stateData->hasOneCountry->name }}</td>
                                                    <td>
                                                        <span class="{{ $stateData['status'] == 0 ? 'badge badge-danger' : 'badge badge-success' }}">
                                                            {{ $stateData['status'] == 0 ? 'Inactive' : 'Active' }}
                                                        </span>
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
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            ...
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form action="{{ route('show_role.destroy',$stateData->id) }}" method="POST" class="d-inline">
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
                </div><!-- /.container-fluid -->
            </section>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready( function () {
            $('#countryTable').DataTable();
        });
    </script>
@endsection
