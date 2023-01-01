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
                <h3 class="card-title">Campaigns Details</h3>
                <a href="{{route('campaigns.register')}}">
                  <button class="btn btn-primary d-inline-block m-2 float-right"> Add </button>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <!--<th style="width: 10px">#</th>-->
                      <th>Campaign Name</th>
                      <th>User Name</th>
                      <th>Product Name</th>
                      <th>Date</th>
                      <th style="width: 180px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($campaigns as $campaign)
                    <tr>
                      <!--<td>1.</td>-->
                      <td>{{$campaign->campaign_name}}</td>
                      <td><a href="{{route('campaigns.executives', ['id' => $campaign->campaign_id])}}">{{'Marketing Exceptions'}}</a></td>
                      <td>{{$campaign->productName}}</td>
                      <td>{{$campaign->date}}</td>
                      <td>
                        <a href="{{route('campaigns.delete', ['id' => $campaign->campaign_id])}}"><button class="btn btn-danger">delete</button></a>
                        <a href="{{route('campaigns.edit', ['id' => $campaign->campaign_id])}}"><button class="btn btn-primary">edit</button></a>
                      </td>
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