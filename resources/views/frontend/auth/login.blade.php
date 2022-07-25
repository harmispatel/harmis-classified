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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>

<body>
    <section class="form-main">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="text-center mb-1">
                        <img src="{{ asset('image/logo.png') }}" style="width: 100%; max-width: 230px;"
                            class="img-fluid card-img p-3" alt="Logo">
                    </div>
                    
                    <div class="form-inr">
                        <div class="text-center mb-3">
                            <h5 class="gradient-text">Welcome Back, Login to continue</h5>
                        </div>
                        
                        <form action="{{ route('userLogin') }}" method="POST" id="loginForm">
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

                            <div class="mt-4 align-items-center d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <a href="{{ route('register') }}" style="text-decoration: none;">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery library -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    <!-- ✅ FIRST - Load JQuery ✅ -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

    <!-- ✅ SECOND - Load JQuery Validate ✅ -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
      integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <!-- ✅ THIRD - Load Additional Methods ✅ -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"
      integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <script>
        $(document).ready(function() {
            // Validate the Login Form
            $("#loginForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                messages : {
                    email: {
                        required: "Email is required",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Password is required"
                    }
                }
            });
        });
    </script>
</body>

</html>
