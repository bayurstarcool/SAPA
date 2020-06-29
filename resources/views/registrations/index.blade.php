@extends('layouts.apps')

@section('content')

    <!-- Main content -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">List Of Registrant</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Reg Number</th>
                      <th>User</th>
                      <th>Departement</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registrations as $reg)
                    <tr>
                      <td><a href="pages/examples/invoice.html">#{{$reg->id}}</a></td>
                      <td><a href="pages/examples/invoice.html">{{$reg->code}}</a></td>
                      <td>{{$reg->name}}</td>
                      <td><span class="badge badge-success">0</span></td>
                      <td><a href="{{url('/registrations/'.$reg->id.'/edit')}}">Edit | Delete</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                {{$registrations->links()}}
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.row -->
          </div>
            <!-- /.card -->
          </div>
          </div>
          </div><!--/. container-fluid -->
    </section>
@endsection
