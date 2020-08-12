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
                <h3 class="card-title">History > #{{$qrcode->code}}</h3>

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
              <div class="card-body p-0 mb-3">
              <div class="visible-print pt-5 text-center">
    {!! QrCode::size(300)->generate($qrcode->code); !!}
    <p>Scan me : {{$qrcode->code}}</p>
    <p>Time : {{$qrcode->created_at->format('d-m-Y h:i:s')}}
    <p>Status : {{$qrcode->status==0?'pending':'success'}}
</div>
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
