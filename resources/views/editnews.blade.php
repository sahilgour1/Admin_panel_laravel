@extends('layout.app')
@section('content')
<form method="POST" action="/updatenews"enctype="multipart/form-data">
  @csrf
        <h2>Edit  News Post</h2>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?php echo $news['title']?>" placeholder="Enter blog title" >
            <input type="hidden" name="id"  value="<?php echo $news['id']?>">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date"   value="<?php echo $news['date']?>">
            <span style="color:red">@error("date"){{$message}}@enderror</span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email"  value="<?php echo $news['email']?>" name="email" placeholder="Enter your email" >
            <span style="color:red">@error("email"){{$message}}@enderror</span>
        </div>

        <div class="input-group">
            <label>Upload Image:</label><br>
        <img src="{{ asset( $news->image) }}" alt="" height="100" width="100">
            <input type="file" name="image" id="image" />
        </div>
        <p>@error('image'){{$message}}@enderror</p>

        <div class="form-group">
            <label for="author">Author Name</label>
            <input type="text" id="author" name="authorname" value="<?php echo $news['authorname']?>" placeholder="Enter author name" >
            <span style="color:red">@error("authorname"){{$message}}@enderror</span>
        </div>
        <div class="form-group">
            <label for="category">Gender</label>
            <select id="category" name="gender">
                <option value="Male" <?php echo (isset($news['gender']) && $news['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo (isset($news['gender']) && $news['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo (isset($news['gender']) && $news['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>
           
        </div>

        <div class="form-group">
            <label for="category">Category For</label>
            <select id="category" name="category_for">
                <option value="Health" <?php echo (isset($news['category_for']) && $news['category_for'] == 'Health') ? 'selected' : ''; ?>>Health</option>
                <option value="Education" <?php echo (isset($news['category_for']) && $news['category_for'] == 'Education') ? 'selected' : ''; ?>>Education</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Write a brief description..."><?php echo $news['description']?></textarea>
            <span style="color:red">@error("description"){{$message}}@enderror</span>
        </div>


        <button type="submit" class="submit-btn">Update</button>
    </form>
@endsection
