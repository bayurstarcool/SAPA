@extends('layouts.apps')

@section('content')

    <!-- Main content -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Departement</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{url('departements/'.$dept->id)}}">
              @method('patch')
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Name of Departement</label>
                    <input type="text" class="form-control" name="name" value="{{$dept->name}}" placeholder="Enter name of departement">
                  </div>
                  <div class="form-group">
                    <label>Code of Departement</label>
                    <input type="text" class="form-control" name="code" value="{{$dept->code}}" placeholder="Enter code of departement">
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
