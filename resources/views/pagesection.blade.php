@extends('layout.app')
@section('content')
<form method="POST" action="insertpages"enctype="multipart/form-data">
  @csrf
        <h2> pages Post</h2>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Enter blog title" >
            <span style="color:red">@error("title"){{$message}}@enderror</span>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" >
            <span style="color:red">@error("date"){{$message}}@enderror</span>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="number" placeholder="Enter your phone number" >
            <span style="color:red">@error("number"){{$message}}@enderror</span>
        </div>
  
        <div class="form-group">
            <label for="category">Gender </label>
            <select id="category" name="gender" >
                <option value="" disabled selected>Select a Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <span style="color:red">@error("gender"){{$message}}@enderror</span>
        </div>
     
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Write a brief description..." ></textarea>
            <span style="color:red">@error("description"){{$message}}@enderror</span>
        </div>

        <button type="submit" class="submit-btn">Post</button>
    </form>
@endsection
