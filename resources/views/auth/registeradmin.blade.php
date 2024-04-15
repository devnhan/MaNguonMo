<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
    <style>
        /* Paste your CSS styles here */
        /* Import Google font - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            min-height: 100vh;
            width: 100%;
            background: #009579;
        }
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            max-width: 430px;
            width: 100%;
            background: #fff;
            border-radius: 7px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.3);
        }
        .container .registration {
            display: none;
        }
        #check:checked ~ .registration {
            display: block;
        }
        #check:checked ~ .login {
            display: none;
        }
        #check {
            display: none;
        }
        .container .form {
            padding: 2rem;
        }
        .form header {
            font-size: 2rem;
            font-weight: 500;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .form input {
            height: 50px; /* Reduce height */
            width: calc(100% - 30px); /* Adjust width */
            padding: 0 15px;
            font-size: 17px;
            margin-bottom: 1rem; /* Reduce margin */
            border: 1px solid #ddd;
            border-radius: 6px;
            outline: none;
        }
        .form input:focus {
            box-shadow: 0 1px 0 rgba(0,0,0,0.2);
        }
        .form a {
            font-size: 16px;
            color: #009579;
            text-decoration: none;
        }
        .form a:hover {
            text-decoration: underline;
        }
        .form input.button {
            height: 50px; /* Reduce height */
            color: #fff;
            background: #009579;
            font-size: 1.2rem;
            font-weight: 500;
            letter-spacing: 1px;
            margin-top: 1rem; /* Reduce margin */
            cursor: pointer;
            transition: 0.4s;
        }
        .form input.button:hover {
            background: #006653;
        }
        .signup {
            font-size: 17px;
            text-align: center;
        }
        .signup label {
            color: #009579;
            cursor: pointer;
        }
        .signup label:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<!-- Paste your HTML content here -->
<div class="container">
        <div class="form">
            <header>Register Admin</header>
            <form method="POST" action="{{ route('register.admin') }}">
                @csrf
                <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail ') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                
                <input type="submit" class="button" value="Register">
            </form>
            <div class="signup">
                <span class="signup">Already have an account?
                <a href="{{ route('login') }}" class="btn btn-link">
                                        Login
                                    </a>
                    <button id="signup-button"></button>
                </span>
            </div>
        </div>
    </div>
    <div id="success-message" style="display: none;">
    Registration successful! Redirecting to login page...
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var signupButton = document.getElementById("signup-button");
        signupButton.addEventListener("click", function() {
            window.location.href = "login.php"; // Redirect to login page
        });
    });
</script>
</body>
</html>
