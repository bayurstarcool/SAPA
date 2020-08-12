@extends('layouts.apps')

@section('content')
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <!-- Main content -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registration</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('registrations')}}">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Choose Departement</label>
                    <select class="form-control" name="dept_id">
                    @foreach($departements as $dept)
                    <option value="{{$dept->id}}">{{$dept->name}}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                  <label>Choose Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="date" class="form-control datetimepicker-input" data-target="#reservationdate">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          </div>
          </div><!--/. container-fluid -->
    </section>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>
<!-- bootstrap datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.12/js/adminlte.min.js"></script>
<script>
$(document).ready(function(){
  $('#reservationdate').datepicker({
    format: 'dd/mm/yyyy',
    todayHighlight:'TRUE',
    startDate: '-0d',
    autoclose: true,
    }).datepicker("setDate",'now');;
});
</script>
@stop