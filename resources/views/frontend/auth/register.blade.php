<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>

<body>
    <section class="form-main">
        <!-- Success Message -->
        @if (session('success'))
            <div class="d-flex justify-content-end">
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        
        <!-- Error Message -->
        @if (session('error'))
            <div class="d-flex justify-content-end">
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            </div>
        @endif
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center mb-1">
                        <img src="{{ asset('image/logo.png') }}" style="width: 100%; max-width: 230px;"
                            class="img-fluid card-img p-3" alt="Logo">
                    </div>

                    <div class="form-inr">
                        <div class="text-center mb-3">
                            <h5 class="gradient-text">Add your details</h5>
                        </div>
                        <form action="{{ route('userRegister') }}" method="POST" id="register">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" class="form-control" id="mobile" name="mobile">
                                @if ($errors->has('mobile'))
                                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role_id" id="role" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

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

                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword"
                                    name="confirmPassword">
                                @if ($errors->has('confirmPassword'))
                                    <span class="text-danger">{{ $errors->first('confirmPassword') }}</span>
                                @endif
                            </div>
                            
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Register</button>
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
            setTimeout(() => {
                $('.alert').hide()
            }, 3000);

            // Validate the Login Form
            $("#register").validate({
                rules: {
                    name: {
                        required: true
                    },
                    mobile: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        number: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    },
                    confirmPassword : {
                        required: true,
                        equalTo : "#password"
                    }
                },
                messages : {
                    name: {
                        required: "Name is required"
                    },
                    mobile: {
                        required: "Mobile No. is required",
                        minlength: "Mobile No. must be 10 digits",
                        maxlength: "Mobile No. must be 10 digits",
                        number: "Mobile No. is not valid"
                    },
                    email: {
                        required: "Email is required",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Password is required"
                    },
                    confirmPassword: {
                        required: "Password Confirmation is required",
                        equalTo : "Password Confirmation does not match with Password"
                    }
                }
            });
        });
    </script>
</body>

</html>
