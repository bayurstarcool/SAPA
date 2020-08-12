@extends('layouts.apps')

@section('content')
@php
 $totalReg = \App\Registration::count();
 $totalDept = \App\Departement::count();
 $totalUser = \App\User::count();
 $totalReview = \App\Registration::count();
 $regToday = \App\Registration::whereDate('created_at',\Carbon\Carbon::today())->count();
 $regSuccess = \App\Registration::where('status',1)->count();
 $regPending = \App\Registration::where('status',0)->count();
@endphp

    <!-- Main content -->
    <section class="content-header">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Registrations</span>
                <span class="info-box-number">
                  {{$totalReg}}
                  <small>Users</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Departements</span>
                <span class="info-box-number">{{$totalDept}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Reviews</span>
                <span class="info-box-number">{{$totalReview}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number">{{$totalUser}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
          <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Your delegation</h3>

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
                      <th>Reg ID</th>
                      <th>Departement</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($delegations->count()>0)
                      @foreach($delegations as $del)
                      <tr>
                        <td><a href="pages/examples/invoice.html">{{$del->code}}</a></td>
                        <td>{{$del->departement->name}}</td>
                        <td>{{$del->user->name}}</td>
                        <td><span class="badge badge-success">{{$del->created_at}}</span></td>
                        <td>
                        @if($del->status==0)
                          <div class="sparkbar" data-color="#00a65a" data-height="20"><a href="{{url('registrations/'.$del->id)}}/actions?ref=success">Take Action</a></div>
                        @endif
                        </td>
                      </tr>
                      @endforeach
                    @else
                      <tr>
                      <td colspan="4" style="text-align:center">No Jobs</td>
                      </tr>
                    @endif
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               {!!$delegations->links()!!}
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <!-- /.row -->
          </div>
          <!-- /.col -->
          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Registered Today</span>
                <span class="info-box-number">{{$regToday}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Success</span>
                <span class="info-box-number">{{$regSuccess}}</span>
              </div>
              <div class="info-box-content">
                <span class="info-box-text">Pending</span>
                <span class="info-box-number">{{$regPending}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>

          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
          <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest All Registrant</h3>

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
                      <th>Reg ID</th>
                      <th>Departement</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registrations as $reg)
                    <tr>
                      <td><a href="pages/examples/invoice.html">{{$reg->code}}</a></td>
                      <td>{{$reg->departement->name}}</td>
                      <td>{{$reg->user->name}}</td>
                      <td><span class="badge badge-success">{{$reg->created_at}}</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{$reg->status===0?'pending':'success'}}</div>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              {!!$registrations->links()!!}
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <!-- /.row -->
          </div>
          <!-- /.col -->
        </div>
        
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
@endsection
