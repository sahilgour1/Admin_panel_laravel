@extends('layout.app')
@section('content')
<h1 style="color:blue"> Health Blogs  </h1>
<p><a href="{{ route('dashboard') }}" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Add Blogs </a></p>

<div class="table-container">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <table id="blogTable" class="animated-table">
      <thead>
        <tr>
        <?php  $count = 0;?>
          <th>S no</th>
          <th>Author Name</th>
          <th>Title</th>
          <th>Date</th>
          <th>Category For</th>
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
                url: '/healthdatatable',
                type: 'POST',
            },
            pageLength: 5, 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'authorname', name: 'authorname' },
                { data: 'title', name: 'title' },
                { data: 'date', name: 'date' },
                { data: 'category_for', name: 'category_for' },
                { data: 'edit', orderable: false, searchable: false },
                { data: 'delete', orderable: false, searchable: false },
            ],
        });
});

</script>
@endsection




