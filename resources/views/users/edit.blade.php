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
                <h3 class="card-title">Edit user #{{$user->name}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('users/'.$user->id)}}">
              @csrf
              @method('patch')
                <div class="card-body">
                  <div class="form-group">
                    <label>Full name</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Enter fullname">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" value="{{$user->email}}" name="email" class="form-control" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" autocomplate="off" name="password" class="form-control" placeholder="Enter password">
                  </div>
                  <div class="form-group">
                    <label>Role @foreach($user->roles as $ur) | current {{$ur->name}} @endforeach</label>
                   <select name="role" class="form-control">
                   <option disabled selected>Select One<option>
                   @foreach($roles as $r)
                   <option value="{{$r->id}}">{{$r->name}}</option>
                   @endforeach
                   </select>
                  </div>
                  <div class="form-group">
                    <label>Departement (optional and admin required) @foreach($user->departements as $dept) | current {{$dept->name}} @endforeach</label>
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
