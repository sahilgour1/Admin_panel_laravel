@extends('layout.app')
@section('content')
<form action="/add_user" method="POST">
        @csrf
        <h1>Add User</h1>
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
        <div class="form-group">
            <label for="category">Gender </label>
            <select id="category" name="gender" >
                <option value="" disabled selected>Select a Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            </div>
            <span>@error("gender"){{$message}}@enderror</span>
        </div>
       
        <div class="button">
        <input type="submit" value="Submit" style="width:204px; margin-left:37%; background-color: cornflowerblue; color:white;">

        </div>
    </form>
@endsection
