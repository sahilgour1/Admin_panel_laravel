@extends('layout.app')
@section('content')
<form action="insertcompanydetail" method="POST">
        @csrf
        <h2>Company Details</h2>
        <form  action="/insertcompanydetail"  method="POST">
            <div class="input-group">
                <label for="company-name">Company Name</label>
                <input type="text" id="company_name" name="companyname" >
            <span style="color:red">@error("companyname"){{$message}}@enderror</span>

            </div>
            <div class="input-group">
                <label for="company-type">Company Type</label>
                <select id="company-type" name="companytype" >
                    <option value="">Select Company Type</option>
                    <option value="private">Private</option>
                    <option value="public">Public</option>
                    <option value="nonprofit">Nonprofit</option>
                </select>
            <span style="color:red">@error("companytype"){{$message}}@enderror</span>

            </div>
            <div class="input-group">
                <label for="company-email">Company Email</label>
                <input type="email" id="company-email" name="companyemail" >
            <span style="color:red">@error("companyemail"){{$message}}@enderror</span>

            </div>
            <div class="input-group">
                <label for="company-email">Date</label>
                <input type="date" id="company-email" name="companydate" >
            <span style="color:red">@error("companydate"){{$message}}@enderror</span>

            </div>
            <button type="submit" style="
                margin-top: 17px;
                margin-left: 247px;
                background-color: cornflowerblue;
                color: white;
                border: 1px solid white;
                padding: 8px;
            ">Submit</button>
        </form>
@endsection
