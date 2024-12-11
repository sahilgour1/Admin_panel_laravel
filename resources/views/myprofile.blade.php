@extends('layout.app')
@section('content')
<form action="/update_user" method="POST">
<h1 style="
margin-left:240px;

">

<svg xmlns="http://www.w3.org/2000/svg" width="80" height="55" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
    </svg>
</h1>

        @csrf
        <div class="user_details">
            <div class="input_box">
                <span class="details">First Name</span>
                <input type="text" name="First_Name" value=" {{$myprofile->First_Name}}" class="fileds" placeholder="Enter your name">
                <input type="hidden" value="{{$myprofile->id}}" name="id">
                <span>@error("First_Name"){{$message}}@enderror</span>
            </div>
            <div class="input_box">
                <span class="details">Last Name</span>
                <input type="text" class="fileds" name="last_Name" value=" {{$myprofile->last_Name}}"placeholder="Enter your Last Name">
                <span>@error("last_Name"){{$message}}@enderror</span>
            </div>
            <div class="input_box">
                <span class="details">Email</span>
                <input type="email" name="email" class="fileds"value=" {{$myprofile->email}}" placeholder="Enter your Email">
                <span>@error("email"){{$message}}@enderror</span>
            </div>
            <div class="input_box">
                <span class="details">Phone Number</span>
                <input type="text" class="fileds" name="number"value=" {{$myprofile->number}}" placeholder="Enter your Phone">
                <span>@error("number"){{$message}}@enderror</span>
            </div>
            <div class="input_box">
                <span class="details">Password</span>
                <input type="password" class="fileds" value=" {{$myprofile->password}}"name="password" placeholder="Enter your Password">
                <span>@error("password"){{$message}}@enderror</span>
            </div>
            <div class="input_box">
                <span class="details">Date of Birth</span>
                <input type="date" class="fileds" value="{{$myprofile->dob}}"name="dob">
                <span>@error("dob"){{$message}}@enderror</span>
            </div>
        </div>
        <div class="form-group">
            <label for="category">Gender</label>
            <select id="category" name="gender">
                <option value="Male" <?php echo (isset($myprofile['gender']) && $myprofile['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo (isset($myprofile['gender']) && $myprofile['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo (isset($myprofile['gender']) && $myprofile['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>
        </div>
        <div class="button">
            <input type="submit" value="Update">
        </div>
    </form>
@endsection
