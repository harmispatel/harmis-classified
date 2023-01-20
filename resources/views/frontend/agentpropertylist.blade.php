{{--
    THIS IS CREATE PROOERTIES PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    createProperties.blade.php

    Only Agent Can Proerty Create.
    It Displayed Create New Property Form.
    ----------------------------------------------------------------------------------------------
--}}


@extends('frontend.common.layout')

@section('title', 'Properties')

@section('content')
<nav aria-label="breadcrumb" class="pt-2">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('showProperty') }}">{{__('HOME')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('My Properties')}}</li>
      </ol>
    </div>
  </nav>  
    <div class="content">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-end mr-3 mb-2 mt-2">
                            <a href="{{ route('addagentProperty') }}" class="btn btn-primary">{{__('Add Propertys')}}</a>
                        </div>
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">{{__('List Properties')}}</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <table class="table table-striped " id="propertyTable">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">{{__('Image')}}</th>
                                                        <th>{{__('Name')}}</th>
                                                        <th>{{__('Category')}}</th>
                                                        <th>{{__('Price')}}</th>
                                                        <th>{{__('Type')}}</th>
                                                        <th>{{__('country')}}</th>
                                                        <th>{{__('State')}}</th>
                                                        <th>{{__('Address')}}</th>
                                                        <th>{{__('Status')}}</th>
                                                        <th class="text-right">{{__('Actions')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($ajentProprtry as $propertiesData)
                                                        <tr>
                                                            <td class="text-center">
                                                                <img src="{{ asset('public/multiImage/'.$propertiesData->image) }}" style="height: 100px; width: 100px;">
                                                            </td>
                                                            <td>{{$propertiesData['name']}}</td>
                                                            <td>{{$propertiesData->hasOneCategory['name']}}</td>
                                                            <td>{{$propertiesData['price']}}</td>
                                                            <td>{{$propertiesData['property_type'] == 1 ? 'For Rent' : 'For Sale' }}</td>
                                                            <td>{{$propertiesData->hasOneCountry['name']}}</td>
                                                            <td>{{$propertiesData->hasOneState->name}}</td>
                                                            <td>{{$propertiesData['address']}}</td>
                                                            <td>
                                                                <span class="{{ $propertiesData['status'] == 0 ? 'badge bg-danger' : 'badge bg-success' }}">
                                                                    {{ $propertiesData['status'] == 0 ? 'Inactive' : 'Active' }}
                                                                </span>
                                                            </td>
                                                            <td class="text-right">
                                                                <a href="{{ route('editAgentProperty',Crypt::encrypt($propertiesData->id)) }}" class="mr-2" title="Edit"><i class="fas fa-edit"></i></a>
                                                                <i class="fa fa-trash text-danger deleteBtn" data-bs-toggle="modal" style="cursor: pointer;" data-bs-target="#exampleModal" data-target-id="{{ route('agentpropertydelete',Crypt::encrypt($propertiesData->id)) }}" title="Delete"></i>
                                                            </td>
                                                            {{-- model --}}
                                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Are you sure to delete this property?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <form id="deleteForm" method="POST" class="d-inline">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            {{-- model --}}
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                </table>
                                                    {{-- {!! $ajentProprtry->links() !!} --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('js')
    <script>
        $(".deleteBtn").click(function(){
            var url = $(this).attr("data-target-id")
            $("#deleteForm").attr("action",url)
        })
    </script>
@endsection
