
@extends('layout.app')
@section('content')
<div class="table-container">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <table id="blogTable" class="animated-table">
    <div class="filter-container">
      <div class="news-container">
          <h1 class="news-heading">Education Blogs</h1>
          <div class="addmore">
          <a href="{{ route('dashboard') }}" class="news-link">Add blogs</a>
      </div>
    </div>
    <div class="">
        <h4>Filter</h4>
        <div class="filter-inputs">
          <label for="startDate">Start Date:</label>
          <input type="date" name="startDate" id="startDate">
          <label for="endDate">End Date:</label>
          <input type="date"name="startDate" id="endDate">
          <button id="filterButton">Filter</button>
        </div>
    </div>
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
       const table =  $('#blogTable').DataTable({
            processing: true,
            serverSide: true,
            paging:   false,
            ajax: {
                url: '/blogeducationdatatabel',
                type: 'POST',
                data: function (d) {
                    d.startDate = $('#startDate').val(); 
                   d.endDate = $('#endDate').val(); 
                } 
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
        $('#filterButton').on('click', function () {
            table.ajax.reload();
        });
});

</script>
@endsection




