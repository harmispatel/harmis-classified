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
                                    <table class="table table-striped " id="countryTable">
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
                                    {{ $showStateData->links() }}
                                    {{-- <div class="d-flex justify-content-between align-items-center">
                                        {{ $showStateData->links("pagination::bootstrap-4") }}
                                        Showing {{ count($showStateData)}} of {{$totalstate}} entries
                                    </div> --}}
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
        // $(document).ready( function () {
        //     $('#countryTable').DataTable();
        // });
    </script>
@endsection
