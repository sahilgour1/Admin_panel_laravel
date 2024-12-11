@extends('layout.app')
@section('content')
<form method="POST" action="/updatepages"enctype="multipart/form-data">
  @csrf
        <h2> Edit  pages Post</h2>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" value="{{$page->title}}" name="title" placeholder="Enter blog title" >
            <span style="color:red">@error("title"){{$message}}@enderror</span>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" value="{{$page->date}}" name="date" >
            <span style="color:red">@error("date"){{$message}}@enderror</span>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" value="{{$page->number}}" name="number" placeholder="Enter your phone number" >
            <span style="color:red">@error("number"){{$message}}@enderror</span>
        </div>
  
        <div class="form-group">
            <label for="category">Gender</label>
            <select id="category" name="gender">
                <option value="Male" <?php echo (isset($page['gender']) && $page['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo (isset($page['gender']) && $page['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo (isset($page['gender']) && $page['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>
           
        </div>
            <input type="hidden"name="id" value="{{$page->id}}">
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" value="{{$page->description}}"name="description" placeholder="Write a brief description..." >
            {{$page->description}}
            </textarea>
            <span style="color:red">@error("description"){{$message}}@enderror</span>
        </div>

        <button type="submit" class="submit-btn">Update</button>
    </form>
@endsection
