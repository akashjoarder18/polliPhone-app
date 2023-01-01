@extends('admin.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Marketing Executive</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Marketing Executive</li>
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
                <h3 class="card-title">Marketing Executive History</h3>
                <form action="{{url('/')}}/admin/visits" method="get">
                
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">                           
                            <div class="col-10">
                                    <div class="form-group">
                                          <div class="input-group input-group-lg">
                                              <input type="search" class="form-control form-control-lg" placeholder="Type your search keywords here" name="search" value="">
                                              <div class="input-group-append">
                                                  <button type="submit" class="btn btn-lg btn-default">
                                                      <i class="fa fa-search"></i>
                                                  </button>
                                              </div>
                                          </div>
                                    </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </form>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <!--<th style="width: 10px">#</th>-->
                      <th>Executive Name</th>
                      <th>In Time</th>
                      <th>Out Time</th>
                      <th>Date</th>
                      <th>Outelets</th>
                      <th>Place</th>
                      <th>Banner</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($visits as $visit)
                    <tr>
                      <!--<td>1.</td>-->
                      <td>{{$visit->userName}}</td>
                      <td>{{$visit->in_time}}</td>
                      <td>{{$visit->out_time}}</td>
                      <td>{{$visit->login_date}}</td>
                      <td>{{$visit->outletName}}</td>
                      <td>{{$visit->outletAddress}}</td>
                      <td>{{$visit->bannerName}}</td>
                      
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
    	</div>
    	
    </div>
    <!-- /.row (main row) -->
@endsection