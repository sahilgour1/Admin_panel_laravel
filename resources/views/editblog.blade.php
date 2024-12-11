@extends('layout.app')
@section('content')
<form method="POST" action="/updateblog"enctype="multipart/form-data">
  @csrf
        <h2>Edit  Blog Post</h2>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?php echo $blog['title']?>" placeholder="Enter blog title" >
            <input type="hidden" name="id"  value="<?php echo $blog['id']?>">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date"   value="<?php echo $blog['date']?>">
            <span style="color:red">@error("date"){{$message}}@enderror</span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email"  value="<?php echo $blog['email']?>" name="email" placeholder="Enter your email" >
            <span style="color:red">@error("email"){{$message}}@enderror</span>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="number" value="<?php echo $blog['number']?>" placeholder="Enter your phone number" >
            <span style="color:red">@error("number"){{$message}}@enderror</span>
        </div>
        <div class="form-group">
            <label for="author">Author Name</label>
            <input type="text" id="author" name="authorname" value="<?php echo $blog['authorname']?>" placeholder="Enter author name" >
            <span style="color:red">@error("authorname"){{$message}}@enderror</span>
        </div>
        <div class="input-group">
            <label>Upload Image:</label><br>
        <img src="{{ asset( $blog->image) }}" alt="" height="100" width="100">
            <input type="file" name="image" id="image" />
        </div>
        <p>@error('image'){{$message}}@enderror</p>
        <div class="form-group">
            <label for="category">Gender</label>
            <select id="category" name="gender">
                <option value="Male" <?php echo (isset($blog['gender']) && $blog['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo (isset($blog['gender']) && $blog['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo (isset($blog['gender']) && $blog['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>
           
        </div>

        <div class="form-group">
            <label for="category">Category For</label>
            <select id="category" name="category_for">
                <option value="Health" <?php echo (isset($blog['category_for']) && $blog['category_for'] == 'Health') ? 'selected' : ''; ?>>Health</option>
                <option value="Education" <?php echo (isset($blog['category_for']) && $blog['category_for'] == 'Education') ? 'selected' : ''; ?>>Education</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Write a brief description..."><?php echo $blog['description']?></textarea>
            <span style="color:red">@error("description"){{$message}}@enderror</span>
        </div>


        <button type="submit" class="submit-btn">Update</button>
    </form>
@endsection
