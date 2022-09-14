@extends('common.layout')

@if ($type == 'Add')
    @section('title', 'Add Languages')
@else
    @section('title', 'Edit Languages')
@endif

@section('content')

    <div class="content-wrapper">
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

                        <div class="card card-primary my-4">
                            <div class="card-header">
                                <h3 class="card-title">{{ $type }} Language</h3>
                            </div>

                            <form action="{{ $type == 'Add' ? route('languages.store') : route('languages.update', $language->id) }}"
                                id="quickForm" method="POST"
                            >
                                @csrf
                                @if ($type != 'Add')
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputName">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Language Name" 
                                            value="{{ $type != 'Add' ? $language->name : '' }}"
                                        >
                                        @if ($errors->any())
                                            <div class="text-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputStatus">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="card-footer">
                                    <a href="{{ route('languages.index') }}" class="btn btn-secondary">Back</a>
                                    <button type="submit" class="btn btn-primary">{{ $type == 'Add' ? 'Save' : 'Update' }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
