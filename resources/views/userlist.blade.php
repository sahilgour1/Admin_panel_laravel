@extends('layout.app')
@section('content')
<!-- start  -->
<div class="news-container">
    <h1 class="news-heading">Company User  List </h1>
    <p>
        <a href="{{ route('adduser') }}" class="news-link">Add User</a>
    </p>
</div>
<!-- end  -->
<div class="table-container">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <table id="blogTable" class="animated-table">
      <thead>
        <tr>
          <th>S no</th>
          <th>First_Name</th>
          <th>last_Name</th>
          <th>email</th>
          <th>gender</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
@endsection
@section('js')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#blogTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/companyuserdatatable',
                type: 'POST',
            },
            pageLength: 5,
            columns: [
                { data: 'id', name: 'id'},
                { data: 'First_Name', name: 'First_Name'},
                { data: 'last_Name', name: 'last_Name'},
                { data: 'email', name: 'email' },
                { data: 'gender', name: 'gender'},
                { data: 'edit', orderable: false, searchable: false },
                { data: 'delete', orderable: false, searchable: false },
            ],
        });

});

</script>
@endsection



