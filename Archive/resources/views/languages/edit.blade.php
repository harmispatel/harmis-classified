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
                            @php
                                if(isset($language->language_label))
                                {
                                    $language_label = unserialize($language->language_label);
                                }
                                else {
                                    $language_label = [];
                                }
                            @endphp
                            <form action="{{ route('languages.update', $language->id) }}" id="quickForm" method="POST">
                                @csrf
                                @if ($type != 'Add')
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="id" value="{{$language->id}}">
                                            <label for="exampleInputName">Language Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter Language Name" value="{{$language->name}}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputCode">Language Code</label>
                                            <input type="text" name="code" class="form-control" placeholder="Enter Language Code" value="{{$language->code}}">
                                            @if ($errors->has('code'))
                                                <span class="text-danger">
                                                    {{ $errors->first('code') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputStatus">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <h4>Labels</h4>
                                        @foreach ($labels as $label)
                                            @php
                                                $label_value = isset($language_label[$label->name]) ? $language_label[$label->name] : '';
                                            @endphp
                                            <div class="col-md-6">
                                                <label for="exampleInputName">{{$label->name}}</label>
                                                <input type="text" name="labels[{{$label->name}}]" class="form-control" placeholder="Enter Label Name" value="{{$label_value}}">
                                            </div>
                                        @endforeach
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
