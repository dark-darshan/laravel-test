@extends('layouts.master')
@section('content')
<div class="pagetitle">
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href={{ url('home') }}>Home</a></li>
      <li class="breadcrumb-item"><a href={{ url('posts') }}>Posts</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
        &nbsp;
        <div class="col-lg-12">
            <div class="d-flex justify-content-between">
              <div>
                <a href="{{ route('posts.create') }}" class="btn btn-primary ms-5">ADD</a>
              </div>
            </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered" id="datatable-crud">
            <thead>
              <tr>
              <th>Checkbox</th>
              <th>Id</th>
              <th>Name</th>
              <th>Description</th>
              <th>Images</th>
              <th>Status</th>
              <th>Action</th>
              </tr>
            </thead>
          </table>
          <button id="deleteSelected" class="delete btn btn-danger">Delete Selected</button>
        </div>
        <!-- End Table with stripped rows -->
      </div>
    </div>
  </div>
</div>
</section>
<script type="text/javascript">
$(document).ready( function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#datatable-crud').DataTable({
    rowCallback: function(row, data) {
      if (data.deleted_at) {
        $(row).css('background-color', 'yellow');
      }
    },
    processing: true,
    serverSide: true,
    ajax: "{{ url('posts') }}",
    columns: [
      {
          data: 'checkbox',
          name: 'checkbox',
          orderable: false,
          searchable: false,
          render: function(data, type, full, meta) {
              return '<input type="checkbox" value="' + full.id + '">';
          }
      },
      { data: 'id', name: 'id' },
      { data: 'name', name: 'name' },
      // {
      //   data: 'name',
      //   name: 'name',
      //   render: function (data, type, full, meta) {
      //     if (full.deleted_at) {
      //       return '<span style="background-color: yellow;">' + data + ' (deleted)</span>';
      //     } else {
      //       return data;
      //     }
      //   }
      // },
      { data: 'description', name: 'description' },
      {
        data: 'images',
        name: 'images',
        render: function(data, type, full, meta) {
          var imagesHtml = '';
          data.forEach(function(imageUrl) {
            imagesHtml += '<img src="' + "{{ asset('image/post') }}" + '/' + imageUrl + '" alt="Image" width="100">';
          });
          return imagesHtml;
        }
      },
      { data: 'status', name: 'status' },
      {data: 'action', name: 'action', orderable: false},
    ],
    order: [[1, 'desc']]
  });
  // Handle checkbox click event
  $('#datatable-crud tbody').on('click', 'input[type="checkbox"]', function() {
      var row = $(this).closest('tr');
      if ($(this).is(':checked')) {
          row.addClass('selected');
      } else {
          row.removeClass('selected');
      }
  });

  // Handle delete selected button click event
  $('#deleteSelected').on('click', function() {
      var selectedRows = $('.selected');
      var selectedIds = [];
      selectedRows.each(function() {
          selectedIds.push($(this).find('input[type="checkbox"]').val());
      });

      if (selectedIds.length === 0) {
          alert("No rows selected.");
          return;
      }

      if (confirm("Delete selected records?") == true) {
          var stuId = selectedIds.join(",");
          console.log("stuId",stuId);
          $.ajax({
              type: "DELETE",
              url: "{{ url('delete-all-post') }}",
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: 'ids=' + stuId,
              dataType: 'json',
              success: function(res) {
                  var oTable = $('#datatable-crud').dataTable();
                  oTable.fnDraw(false);
              }
          });
      }
  });
});
</script>
@endsection