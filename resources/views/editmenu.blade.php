@extends('layout.app')
@section('content')
<form method="POST" action="updatemenu"enctype="multipart/form-data">
  @csrf
        <h2> Edit Menu Bar</h2>
        <div class="form-group">
            <label for="category">Menu For</label>
            <select id="category" name="category" class="form-control">
                <option value="Admin" <?php echo (isset($menu['category']) && $menu['category'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                <option value="frontend" <?php echo (isset($menu['category']) && $menu['category'] == 'frontend') ? 'selected' : ''; ?>>Frontend</option>
            </select>
        </div>
        <input type="hidden" name="id" value="<?php echo $menu['id']?>">

        <div class="form-group">
            <label for="Permission">Permission</label>
            <input type="text" value="<?php echo $menu['permission']?>"name="permission">
            <span style="color:red">@error("permission"){{$message}}@enderror</span>
        </div>

        <button type="submit" class="submit-btn">Update</button>
    </form>
@endsection
