@extends('template')
@section('content')
    @if(session('success'))
      <script type="text/javascript">
      function mssge() {
        Swal.fire({
          title: "{{ session('success') }}",
          text: 'You clicked the button!',
          icon: 'success',
          customClass: {
            confirmButton: 'btn btn-primary'
          },
          buttonsStyling: false
        });
      }
      window.onload = mssge;
      </script>
    @endif

    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>{{ $error }}</p>
      @endforeach
    @endif
    
    <div class="row">
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add Form</h5>
            
          </div>
          <div class="card-body">
            <form id="formAuthentication" class="form-horizontal" action="{{ route('users.add') }}" method="POST">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nama" autofocus="autofocus" required>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-username">Username</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-password">Password</label>
                <div class="col-sm-5">
                  <div class="input-group input-group-merge">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">                    
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-passwordconfirm">Password Confirm</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Password Confirmation">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-level">Level</label>
                <div class="col-sm-5">
                  <select class="form-control" name="level" id="level">
                    <option value="" selected="selected">-- Level --</option>
                    <option value="administrator">Administrator</option>
                    <option value="user">User</option>
                  </select>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-success">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>      

      <!-- Users List Table -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-datatable table-responsive">
            <table id="userlist" class="datatables table border-top">
              <thead>
                <tr>
                  <th width="15px">No.</th>
                  <th>User</th>
                  <th>Username</th>
                  <th>level</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
@stop
@section('custom-js')
  <script type="text/javascript">
    $('#userlist').DataTable({
      //responsive: true,
      processing: true,
      serverSide: true,
      ajax: '{!! route('users.data') !!}', // memanggil route yang menampilkan data json
      columns: 
      [
          { data: 'DT_RowIndex', name: 'DT_RowIndex'},
          { // mengambil & menampilkan kolom sesuai tabel database
              data: 'name',
              name: 'name'
          },
          {
              data: 'username',
              name: 'username'
          },
          {
              data: 'level',
              name: 'level'
          },
          {
              data: 'action',
              render: function ( data, type, row, meta ) {
                  return (
                    `<a href="{{ url('users/reset/${row.user_id}') }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-success" title="Reset Password" class="btn btn-sm btn-icon item-edit"><i class="text-success ti ti-refresh"></i></a>` +
                    '<a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-warning" title="Edit" class="btn btn-sm btn-icon item-edit"><i class="text-warning ti ti-pencil"></i></a>'
                  );
              },
              orderable: false, searchable: false
          }
      ],
      drawCallback: function(settings) {
          // Initialize tooltips
          const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
          const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
              return new bootstrap.Tooltip(tooltipTriggerEl, {
                  customClass: tooltipTriggerEl.getAttribute('data-bs-custom-class') || ''
              });
          });
      },
      scrollX: true,
    });
  </script> 
 @stop