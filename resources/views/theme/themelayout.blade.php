{{--
    THIS IS COUNTRY PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    country.blade.php
    It Displayed All Country List.
    ----------------------------------------------------------------------------------------------
--}}

@extends('common.layout')

@section('title', 'List Country')
<style>
    .fix-bt {
        position: fixed;
        bottom: 30px;
        right: 40px;
        z-index: 9;
    }
</style>

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
                        <form action="{{ route('genralsetting') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Fonts</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Select Fonts</label>
                                                <select class="form-select" name="fonts" aria-label="Default select example">
                                                    <option selected value="">Select Font Family</option>
                                                    @php
                                                        $get_font = isset($get_fonts_settings->value) ? $get_fonts_settings->value : '';
                                                    @endphp
                                                    @foreach ($fonts as $key => $font)
                                                        <option value="{{ $font }}" {{ $get_font == $font ? 'selected' : '' }} style="font-family: {{ $font }} !important;">{{ $key }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary fix-bt">
                                <i class="fa fa-save"></i> UPDATE
                            </button>
                        </form>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List Themes</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        @if (isset($themes))
                                            @foreach ($themes as $theme)
                                                <div class="col-md-4 mt-1 mb-3">
                                                    <div class="card h-100" style="border: 1px solid black;">
                                                        <div class="card-header bg-dark text-center pt-1 pb-0">
                                                            <h3>{{ $theme->theme_name }}</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <img src="{{ asset('public/themes/'.$theme->theme_image) }}" class="w-100">
                                                        </div>
                                                        <div class="card-footer bg-dark">
                                                            @if($theme->is_default == 1)
                                                                <button type="button" class="btn btn-secondary w-100" disabled>ACTIVATED &nbsp;<i class="fa fa-check-circle"></i></button>
                                                            @else
                                                                <a href="{{ route('activetheme',$theme->id) }}" class="btn btn-success w-100">ACTIVE</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List Details Page Theme</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        @if (isset($detailsTheme))
                                            @foreach ($detailsTheme as $theme)
                                                <div class="col-md-4 mt-1 mb-3">
                                                    <div class="card h-100" style="border: 1px solid black;">
                                                        <div class="card-header bg-dark text-center pt-1 pb-0">
                                                            <h3>{{ $theme->detail_name }}</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <img src="{{ asset('public/themes/'.$theme->detail_image) }}" class="w-100">
                                                        </div>
                                                        <div class="card-footer bg-dark">
                                                            @if($theme->is_default == 1)
                                                                <button type="button" class="btn btn-secondary w-100" disabled>ACTIVATED &nbsp;<i class="fa fa-check-circle"></i></button>
                                                            @else
                                                                <a href="{{ route('activethemedetails',$theme->id) }}" class="btn btn-success w-100">ACTIVE</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
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
