@extends('layout.app')
@section('content')

   
        <h2> Edit Company Details</h2>

        <form action="{{ route('updatecompanydetail') }}" method="POST">
        @csrf
            <div class="input-group">
                <label for="company-name">Company Name</label>
                <input type="text" id="company_name" value="{{ $companydetail->companyname }}" name="companyname">
            <span style="color:red">@error("companyname"){{$message}}@enderror</span>
                <input type="hidden" name="id" value="{{ $companydetail->id }}">
            </div>
            <div class="input-group">
                <label for="company-type">Company Type</label>
                <select id="company-type" name="companytype">
                    <option value="">Select Company Type</option>
                    <option value="private" {{ $companydetail->companytype == 'private' ? 'selected' : '' }}>Private</option>
                    <option value="public" {{ $companydetail->companytype == 'public' ? 'selected' : '' }}>Public</option>
                    <option value="nonprofit" {{ $companydetail->companytype == 'nonprofit' ? 'selected' : '' }}>Nonprofit</option>
                </select>
                <span style="color:red">@error("companytype"){{ $message }}@enderror</span>
            </div>

            <div class="input-group"> 
                <label for="company-email">Company Email</label>
                <input type="email" id="company-email" value="{{ $companydetail->companyemail }}"  name="companyemail" >
            <span style="color:red">@error("companyemail"){{$message}}@enderror</span>

            </div>
            <div class="input-group">
                <label for="company-email">Date</label>
                <input type="date" id="company-email"  value="{{ $companydetail->companydate }}" name="companydate" >
            <span style="color:red">@error("companydate"){{$message}}@enderror</span>

            </div>
            <button type="submit" style="
                margin-top: 17px;
                margin-left: 247px;
                background-color: cornflowerblue;
                color: white;
                border: 1px solid white;
                padding: 8px;
            ">Update</button>
        </form>
@endsection
