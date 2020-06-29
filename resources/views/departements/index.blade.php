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
                <h3 class="card-title">List Of Departements</h3>

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
                      <th>Dept ID</th>
                      <th>Dept Code</th>
                      <th>Name</th>
                      <th>Total Deligation</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departements as $dept)
                    <tr>
                      <td><a href="pages/examples/invoice.html">#{{$dept->id}}</a></td>
                      <td><a href="pages/examples/invoice.html">{{$dept->code}}</a></td>
                      <td>{{$dept->name}}</td>
                      <td><span class="badge badge-success">0</span></td>
                      <td><a href="{{url('/departements/'.$dept->id.'/edit')}}">Edit | Delete</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                {{$departements->links()}}
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
