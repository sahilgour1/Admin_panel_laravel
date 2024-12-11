@extends('layout.app')
@section('content')

<!-- start  -->
<div class="news-container">
    <h1 class="news-heading">Company profile </h1>
    <p>
        <a href="{{ route('companyprofile') }}" class="news-link">Add Company</a>
    </p>
</div>
<!-- end  -->
<div class="table-container">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <table id="blogTable" class="animated-table">
      <thead>
        <tr>
        <?php  $count = 0;?>
          <th>S no</th>
          <th>companyname</th>
          <th>companytype</th>    
          <th>companydate</th>
          <th>Edit</th>
          <th>Delete</th>
          <th>View Addess</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
 
  
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <div id="address-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); z-index: 9999; padding: 20px;">
    <div style="background-color: white; padding: 20px; border-radius: 8px; max-width: 700px; margin: 0 auto; height: 80%; overflow-y: auto;">

  <form id="address-form" method="POST" style="
        margin-left:-8px;
        margin-bottom: 35px;
        ">
  @csrf
  </form>
                
  <button id="save-address" type="submit" style="background-color: green; color: white; padding: 10px 20px; border: none; cursor: pointer; margin-top: 10px;">Save Address</button>
  <button id="add-new-address" style="background-color: blue; color: white; padding: 10px 20px; border: none; cursor: pointer; margin-top: 10px;">Add Another Address</button>
  <button id="close-overlay" style="background-color: red; color: white; padding: 10px 20px; border: none; cursor: pointer; margin-top: 10px;">Close</button>
    </div>
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
                url: '/companydetaildatatable',
                type: 'POST',
            },
            pageLength: 5, 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'companyname', name: 'authorname' },
                { data: 'companytype', name: 'title' },
                { data: 'companydate', name: 'date' },
                { data: 'edit', orderable: false, searchable: false },
                { data: 'delete', orderable: false, searchable: false },
                { data: 'View Address', orderable: false, searchable: false },

            ],
        });

        
    });

    $(document).on('click', '.view-address-btn', function () {
        const companyId = $(this).data('company-id'); // Assuming company ID is attached to the button
        console.log(companyId);
        $('#save-address').data('company-id', companyId);
        $('#address-overlay').fadeIn();

        // AJAX request to fetch address data
        $.ajax({
          url: 'useraddressdata',
            method: "POST",
            data: { companyid: companyId },
            success: function (response) {
                
                if (response.status == 'success') {
                    const addressData = response.data;
                    console.log(addressData);
                    $('#address-form').empty();
                    addressData.forEach(function (address, index) {
                        const newRow = `
                    <h3 styl="margin-top:30px">Existing Company Address</h3>
                       
                            <div class="form-row" data-id="${address.id}">
                                <input type="hidden" value="${address.id}" name="id[]" class="form-control"> 

                                <label for="address">Address</label>
                                <input type="text" id="address" name="address[]" value="${address.address}" class="form-control" required>
                                <label for="latitude">Latitude</label>
                                <input type="text" id="latitude}" name="latitude[]" value="${address.latitude}" class="form-control" required>
                                <label for="longitude">Longitude</label>
                                <input type="text" id="longitude" name="longitude[]" value="${address.longtude}" class="form-control" required>
                                <label for="mobile-">Mobile</label>
                                <input type="text" id="mobile-" name="mobile[]" value="${address.mobile}" class="form-control" required>
                            </div>
                             <button type="button" class="delete-link btn btn-danger" data-id="${address.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                </svg>
                                Delete
                            </button> <br><br>
                            `;
                        $('#address-form').append(newRow);
                    });
                } else {
                    $('#address-form').html('<p>No address found for this company.</p>');
                }
            },
            error: function () {
                alert('Failed to fetch address data.');
            }
            
        });

        $('#close-overlay').on('click', function () {
            $('#address-overlay').fadeOut();
        });
    });

  
   
    $(document).ready(function () {
    // Open the overlay
    $("#addaddress").click(function () {
        $("#address-overlay").fadeIn();
    });

    // Close the overlay
    $("#close-overlay").click(function () {
        $("#address-overlay").fadeOut();
    });

    // Add another address form dynamically
    $("#add-new-address").click(function () {
    // Get the companyId from the button or elsewhere in the DOM
    var companyId = $(this).data('company-id');
    console.log("Company ID:", companyId); // Debugging: Log the company ID

    // Dynamically create a new address form
    const newForm = `

        <h3 style="margin-top:30px">Existing Company Address</h3>
        <div class="form-row" data-id="">
      
            <input type="hidden" value="" name="id[]" class="form-control">
            <label for="address">Address</label>
            <input type="text" id="address" name="address[]" value="" class="form-control" required>
            <label for="latitude">Latitude</label>
            <input type="text" id="latitude" name="latitude[]" value="" class="form-control" required>
            <label for="longitude">Longitude</label>
            <input type="text" id="longitude" name="longitude[]" value="" class="form-control" required>
            <label for="mobile">Mobile</label>
            <input type="text" id="mobile" name="mobile[]" value="" class="form-control" required>
        </div>
    `;

    // Append the new form to the existing address form
    $("#address-form").append(newForm);

    // Ensure the save button stays at the bottom
    $("#save-address").appendTo("#address-form");
});


    // Save button logic (add your server-side saving logic here)
    $('#save-address').on('click', function () {
    var companyid = $(this).data('company-id'); // Get the company id attached to the button
    var formData = $('#address-form').serializeArray();  // Serialize form data into an array

    var data = {};
    formData.forEach(function (item) {
        // Convert serialized form data into an object with arrays for each input name
        if (!data[item.name]) {
            data[item.name] = [];
        }
        data[item.name].push(item.value);
    });

    // Add company_id to the data object
    data.company_id = companyid;

    console.log(data); // Check if the data is formatted correctly

    $.ajax({
        url: '/saveanothercompanyaddress', // URL for the controller method
        type: 'POST',
        data: data,  // Send data to server
        dataType: 'json', // Expect JSON response
        success: function (response) {
            if (response.status === 'success') {
                alert('Data saved successfully!');
                $('#address-overlay').fadeOut();
                // table.ajax.reload(); // Assuming you're using DataTable
            } else {
                alert(response.message || 'Failed to hjtjyusave data');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
        alert('An error occurred while saving the data');
        console.error('Error details:', textStatus, errorThrown, jqXHR.responseText); // Log for debugging

        // If additional error details are available, display them
        if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
            alert(jqXHR.responseJSON.message);
        } else {
            alert('Unexpected error occurred');
        }
    }
    });
});

        
   // handling delete address 
   $(document).on('click', '.delete-link', function () {
                const addressId = $(this).data('id'); // Get the ID from the button's data attribute

                if (confirm('Are you sure you want to delete this address?')) {
                    $.ajax({
                      url: '/deleteaddressdata', // Update the backend route as needed
                        method: "POST",
                        data: { addressId: addressId }, // Correctly pass the addressId to the backend
                        success: function (response) {
                            if (response.status === 'success') {
                                alert('Address deleted successfully.');
                                $(`.form-row[data-id="${addressId}"]`).remove(); // Remove the deleted address row
                            } else {
                                alert('Failed to delete the address.');
                            }
                        },
                        error: function () {
                            alert('Error deleting address.');
                        }
                    });
                }
            });
});

</script>
@endsection




