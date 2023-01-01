@extends('admin.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Campaigns</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Campaigns</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
@section('body')
    <!-- Main row -->
    <div class="row">
    	<div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Campaigns Executives Details</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                 
                  </thead>
                  <tbody>
                    @foreach($executives as $executive)
                    <tr>
                    <div class="form-group clearfix">
                      <div class="icheck-success d-inline">
                        <input type="checkbox" checked id="{{$executive->id}}">
                        <label for="{{$executive->id}}">
                          {{$executive->userName}}
                        </label>
                      </div>
                      
                    </div>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            
            </div>
    	</div>
    	
    </div>
    <!-- /.row (main row) -->
@endsection