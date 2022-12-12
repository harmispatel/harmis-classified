<div class="content-wrapper">
    <div style = "padding-top:25px">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List Categories</h3>
                                </div>
                                <div class="card-body">
                                    <div>
                                    </div>

                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">country</th>
                                                <th scope="col">State</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($showPropertyData as $showProperty)
                                                <tr>
                                                <th>{{$showProperty->name}}</th>
                                                <td>{{$showProperty->hasOneCategory['name']}}</td>
                                                <td>{{$showProperty->price}}</td>
                                                <td>{{$showProperty->hasOneCountry['name']}}</td>
                                                <td>{{$showProperty->hasOneState['name']}}</td>
                                                <td>{{$showProperty->address}}</td>
                                                <td>
                                                    <span class="{{ $showProperty['status'] == 0 ? 'btn btn-danger' : 'btn btn-success' }}">
                                                        {{ $showProperty['status'] == 0 ? 'Inactive' : 'Active' }}
                                                    </span>
                                                </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
