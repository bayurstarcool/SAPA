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
                <h3 class="card-title">Create new User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('users')}}">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Full name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter fullname">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                  </div>
                  <div class="form-group">
                    <label>Role</label>
                   <select name="role" required class="form-control">
                   @foreach($roles as $r)
                   <option value="{{$r->id}}">{{$r->name}}</option>
                   @endforeach
                   </select>
                  </div>
                  <div class="form-group">
                    <label>Departement (optional and admin required)</label>
                   <select name="dept" class="form-control">
                   <option disabled selected>Select One</option>
                   @foreach($departements as $d)
                   <option value="{{$d->id}}">{{$d->name}}</option>
                   @endforeach
                   </select>
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
