@extends('template')
@section('content')
    @if(session('success'))
      <script type="text/javascript">
      function mssge() {
        Swal.fire({
          title: 'Renewal Success!',
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
    <!-- Employee List Table -->
      <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Monitoring Expired Employee</h5>
            </div>
            <div class="card">
                <div class="card-datatable text-nowrap">
                    <table id="dashboard_emp" class="datatables-ajax table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Employee Number</th>
                                <th>Site</th>
                                <th>Department</th>
                                <th>Employee Name</th>
                                <th>Akhir Kontrak</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
          </div>
      </div>
    </div>

    <!-- Modal Renewal Show -->
    <div class="modal fade" id="modalRenewal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form class="form-horizontal" action="{{ route('employeeHris.emp_renewal') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Renewal Form</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <input type="hidden" id="id_employee_x" name="id_employee" class="form-control" />
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label for="nameBasic" class="form-label" style="display: block;">Nama Karyawan</label>
                <span style="font-weight: bold;" id="employee_name_x"></span>
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="" class="form-label">Awal Contract</label>
                <input type="date" class="form-control" id="start_contract_x" name="start_contract" value="" autofocus="autofocus">
              </div>
              <div class="col mb-0">
                <label for="" class="form-label">Akhir Contract</label>
                <input type="date" class="form-control" id="end_contract_x" name="end_contract" value="" autofocus="autofocus">
              </div>
            </div>
            <div class="row">
              <div class="col mb-1">
                <label for="nameBasic" class="form-label" style="display: block;">Masa Kontrak</label>
                <input type="text" class="form-control" id="duration_contract_x" name="duration_contract" value="" readonly>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
              Tutup
            </button>
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </div>
        </form>
      </div>
    </div>
    <!-- END Modal Renewal -->

    
@stop
@section('custom-js')
    <script type="text/javascript">
    $(document).ready(function() {
        $('#dashboard_emp').DataTable({
            // responsive: true, //for responsive show + button in first column
            processing: true,
            serverSide: true,
            ajax: '{!! route('dashboard.data') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'employee_number', name: 'employee_number' },
                { data: 'siteName', name: 'siteName' },
                { data: 'deptName', name: 'deptName' },
                { data: 'employee_name', name: 'employee_name' },                
                { data: 'end_contract', name: 'end_contract' }
            ],
            scrollX: true,
            createdRow: function(row, data, dataIndex) {
                var endDate = new Date(data.end_contract);
                var currentDate = new Date();
                var diffTime = Math.abs(endDate - currentDate);
                var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                if (endDate < currentDate) {
                    $(row).addClass('red-row');
                } else if (diffDays <= 10) {
                    $(row).addClass('orange-row');
                } else if (diffDays <= 30) {
                    $(row).addClass('yellow-row');
                }
            },
        });
    });
    </script> 
 @stop