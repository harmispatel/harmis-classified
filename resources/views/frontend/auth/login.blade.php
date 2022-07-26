<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

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
                <form action="{{route('userLogin')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                      @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <div align="right">
                        <a href="/registerform">Register</a>
                    </div>

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
