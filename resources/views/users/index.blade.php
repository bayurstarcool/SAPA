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
                <h3 class="card-title">List Of Users</h3>

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
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $r)
                    <tr>
                      <td><a href="pages/examples/invoice.html">#{{$r->id}}</a></td>
                      <td>{{$r->name}}</td>
                      <td>{{$r->email}}</td>
                      <td><a href="{{url('/users/'.$r->id.'/edit')}}">Edit</a> | <a href="{{url('/users/'.$r->id)}}/delete">Delete</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                {{$users->links()}}
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
