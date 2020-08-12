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
                <h3 class="card-title">Create new Review</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('reviews')}}">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Score</label>
                    <select class="form-control" name="score">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
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
<script src="{{asset('dist/js/simple-rating.js')}}"></script>
<script type="text/javascript">
      $(document).ready(function(){
        $('.rating').rating();
      });
    </script>
@stop