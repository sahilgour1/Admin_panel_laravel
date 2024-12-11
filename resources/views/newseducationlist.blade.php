@extends('layout.app')
@section('content')

<div class="news-container">
    <h1 class="news-heading">Education News List</h1>
    <p>
        <a href="{{ route('newspost') }}" class="news-link">Add News</a>
    </p>
</div>
<div class="table-container">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <table id="blogTable" class="animated-table">
      <thead>
        <tr>
          <th>S no</th>
          <th>Title</th>
          <th>Date</th>
          <th>Category_For</th>
          <!-- <th>image</th> -->
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
                url: '/educationnewsdatatable',
                type: 'POST',
            },
            pageLength: 5,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'date', name: 'date' },
                { data: 'category_for', name: 'category_for' },
                // { data: 'image', name: 'image' },
                { data: 'edit', orderable: false, searchable: false },
                { data: 'delete', orderable: false, searchable: false },
            ],
        });

});

</script>
@endsection



