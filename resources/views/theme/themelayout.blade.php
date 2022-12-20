{{--
    THIS IS COUNTRY PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    country.blade.php
    It Displayed All Country List.
    ----------------------------------------------------------------------------------------------
--}}

@extends('common.layout')

@section('title', 'List Country')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <div style = "padding-top:25px">
            {{-- <div class="text-right mr-3 mb-2">
                <a href="#" class="btn btn-primary">Add Country</a>
            </div> --}}
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List Countries</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-1 mb-3">
                                            <div class="card h-100" style="border: 1px solid black">
                                                <div class="card-header bg-dark text-center pt-1 pb-0">
                                                    <h3>Theme 1</h3>
                                                </div>
                                                <div class="card-body">
                                                    <img src="http://192.168.1.116/MultitenancyBasedEcommercePlatform/public/admin/theme_view/theme1.png" class="w-100" />
                                                </div>
                                                <div class="card-footer bg-dark">
                                                    <button type="button" class="btn btn-secondary w-100" disabled="">
                                                        ACTIVATED &nbsp;<i class="fa fa-check-circle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-1 mb-3">
                                            <div class="card h-100" style="border: 1px solid black">
                                                <div class="card-header bg-dark text-center pt-1 pb-0">
                                                    <h3>Theme 2</h3>
                                                </div>
                                                <div class="card-body">
                                                    <img src="http://192.168.1.116/MultitenancyBasedEcommercePlatform/public/admin/theme_view/theme2.png" class="w-100" />
                                                </div>
                                                <div class="card-footer bg-dark">
                                                    <a href="#" class="btn btn-success w-100">ACTIVE</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-1 mb-3">
                                            <div class="card h-100" style="border: 1px solid black">
                                                <div class="card-header bg-dark text-center pt-1 pb-0">
                                                    <h3>Theme 3</h3>
                                                </div>
                                                <div class="card-body">
                                                    <img src="http://192.168.1.116/MultitenancyBasedEcommercePlatform/public/admin/theme_view/theme3.png" class="w-100" />
                                                </div>
                                                <div class="card-footer bg-dark">
                                                    <a href="#" class="btn btn-success w-100">ACTIVE</a>
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

@endsection
