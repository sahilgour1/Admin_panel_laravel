@extends('layout.app')
@section('content')


<form action="/update_user" method="POST">
        @csrf
        <h1> Edit User Data</h1>
        <div class="user_details">
            <div class="input_box">
                <input type="hidden" value="<?php echo $data['id']?>" name="id">
                <span class="details">First Name</span>
                <input type="text" name="First_Name"  value="<?php echo $data['First_Name']?>"class="fileds" placeholder="Enter your name">
                <span>@error("First_Name"){{$message}}@enderror</span>
            </div>
            <div class="input_box">
                <span class="details">Last Name</span>
                <input type="text" class="fileds"  value="<?php echo $data['last_Name']?>" name="last_Name" placeholder="Enter your Last Name">
                <span>@error("last_Name"){{$message}}@enderror</span>
            </div>
            <div class="input_box">
                <span class="details">Email</span>
                <input type="email" name="email" class="fileds" value="<?php echo $data['email']?>" placeholder="Enter your Email">
                <span>@error("email"){{$message}}@enderror</span>
            </div>
            <div class="input_box">
                <span class="details">Phone Number</span>
                <input type="text" class="fileds" name="number" value="<?php echo $data['number']?>" placeholder="Enter your Phone">
                <span>@error("number"){{$message}}@enderror</span>
            </div>
            <div class="input_box">
                <span class="details">Date of Birth</span>
                <input type="date" class="fileds" value="<?php echo $data['dob']?>" name="dob">
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
            <input type="submit" value="Update" style="width:204px; margin-left:37%; background-color: cornflowerblue; color:white;">
        </div>
    </form>
@endsection
