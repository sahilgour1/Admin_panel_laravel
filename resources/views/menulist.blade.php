@extends('layout.app')
@section('content')
<!-- start  -->
<div class="news-container">
    <h1 class="news-heading">Menu List </h1>
    <p>
        <a href="{{ route('menubar') }}" class="news-link">Add Menu</a>
    </p>
</div>
<!-- end  -->
<div class="table-container">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <table id="blogTable" class="animated-table">
      <thead>
        <tr>
          <th>S no</th>
          <th>Category</th>
          <th>Permission</th>
          <th>Edit</th>
          <th>Delete</th>
          <th>Addmenu</th>
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
                url: '/menudatatable',
                type: 'POST',
            },
            pageLength: 5,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'category', name: 'category' },
                { data: 'permission', name: 'permission' },
                { data: 'edit', orderable: false, searchable: false },
                { data: 'delete', orderable: false, searchable: false },
                { data: 'addmenu', orderable: false, searchable: false },
            ],
        });

});

</script>
@endsection



