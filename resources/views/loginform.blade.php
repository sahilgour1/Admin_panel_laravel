<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="<?php echo asset('css/loginform.css');?>">

</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="title">Login</h2>
            <form action="/login" method="POST">
            @csrf
                <div class="input-box">
                    <label for="username" class="label">password</label>
                    <input type="password" id="username" name="password" placeholder="Enter your Password" >
                <span>@error("password"){{$message}}@enderror</span>

                </div>
                <div class="input-box">
                    <label for="password" class="label">email</label>
                    <input type="email" id="password" name="email" placeholder="Enter your Email" >
                <span>@error("email"){{$message}}@enderror</span>

                </div>
                <div class="login_link">
                    <a href="{{ route('registerform') }}">dont  have an account? register here</a>
                </div><br>
                <div class="button">
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
