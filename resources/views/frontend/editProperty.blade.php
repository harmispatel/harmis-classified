<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Propertys</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">


    <!-- Font awesome -->
    <link href="{{ asset ('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset ('css/custom.css')}}" rel="stylesheet">


    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>
  <body>
  <section class="form-main">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-inr">
                <form action="{{route('updateProperty',$editPropertyData->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" value="{{$editPropertyData->name}}" name="name">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    <div class="form-group">
                      <label for="category">Category</label>
                      {{-- <input type="text" class="form-control" id="category" name="category"> --}}
                        <select class="form-control" id="category" name="category_id">
                            {{-- <option value="1">Hello</option> --}}
                            {{-- @foreach ($categoryId as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach --}}
                            <option value="1">category</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="price" class="form-control" value="{{$editPropertyData->price}}" id="price" name="price">
                        @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        {{-- <input type="text" class="form-control" id="category" name="category"> --}}
                          <select class="form-control" id="country" name="country_id">
                              {{-- <option value="1">Hello</option> --}}
                              {{-- @foreach ($categoryId as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach --}}
                              <option value="1">Country</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="state">State</label>
                        {{-- <input type="text" class="form-control" id="category" name="category"> --}}
                          <select class="form-control" id="state" name="state_id">
                              {{-- <option value="1">Hello</option> --}}
                              {{-- @foreach ($categoryId as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach --}}
                              <option value="1">state</option>
                          </select>
                      </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" id="address">{{$editPropertyData->address}}</textarea>
                        @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option {{ ($editPropertyData->status) == '1' ? 'selected' : '' }} value="1">Active</option>
                            <option {{ ($editPropertyData->status) == '0' ? 'selected' : '' }} value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </section>


  <!-- jQuery library -->
  <script src="{{ asset ('js/jquery.min.js')}}"></script>
  <script src="{{ asset ('js/bootstrap.min.js')}}"></script>

  </body>
</html>
