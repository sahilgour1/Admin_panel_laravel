<!-- resources/views/registerform.blade.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo asset('css/register.css');?>">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="title">Registration</div>
    <form action="/register_user" method="POST">
        @csrf
        <div class="user_details">
            <div class="input_box">
                <span class="details">First Name</span>
                <input type="text" name="First_Name" class="fileds" placeholder="Enter your name">
                <span>@error("First_Name"){{$message}}@enderror</span>
            </div>
            <div class="input_box">
                <span class="details">Last Name</span>
                <input type="text" class="fileds" name="last_Name" placeholder="Enter your Last Name">
                <span>@error("last_Name"){{$message}}@enderror</span>
            </div>
            <div class="input_box">
                <span class="details">Email</span>
                <input type="email" name="email" class="fileds" placeholder="Enter your Email">
                <span>@error("email"){{$message}}@enderror</span>
            </div>
            <div class="input_box">
                <span class="details">Phone Number</span>
                <input type="text" class="fileds" name="number" placeholder="Enter your Phone">
                <span>@error("number"){{$message}}@enderror</span>
            </div>
            <div class="input_box">
                <span class="details">Password</span>
                <input type="password" class="fileds" name="password" placeholder="Enter your Password">
                <span>@error("password"){{$message}}@enderror</span>
            </div>
            <div class="input_box">
                <span class="details">Date of Birth</span>
                <input type="date" class="fileds" name="dob">
                <span>@error("dob"){{$message}}@enderror</span>
            </div>
        </div>
        <div class="gender_details">
            <span class="gender_title">Gender</span>
            <div class="category">
                <label>
                    <input type="radio" name="gender" value="Male">
                    <span>Male</span>
                </label>
                <label>
                    <input type="radio" name="gender" value="Female">
                    <span>Female</span>
                </label>
                <label>
                    <input type="radio" name="gender" value="Prefer not to say">
                    <span>Prefer not to say</span>
                </label>
            </div>
            <span>@error("gender"){{$message}}@enderror</span>
        </div>
        <div class="login_link">
            <a href="{{ route('loginform') }}">Already have an account? Login here</a>
        </div>
        <div class="button">
            <input type="submit" value="Register">
        </div>
    </form>
</div>

</body>
</html>
