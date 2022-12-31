@extends('admin.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Users</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Users</li>
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
                <h3 class="card-title">Users Details</h3>
                <a href="{{route('users.register')}}">
                  <button class="btn btn-primary d-inline-block m-2 float-right"> Add </button>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <!--<th style="width: 10px">#</th>-->
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <!--<td>1.</td>-->
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>
                          @if($user->role == 1)
                            Super User
                          @elseif($user->role == 2)
                            Admin
                          @else
                            Marketing Executive
                          @endif
                      </td>
                      <td>
                          @if($user->gender == "M")
                            Male
                          @elseif($user->gender == "F")
                            Female
                          @else
                            Other
                          @endif
                      </td>
                      <td>{{$user->address}}</td>
                      <td>
                          @if($user->status == "1")
                           <span class="badge badge-success"> active </span>
                          @else
                          <span class="badge badge-danger"> inactive </span>
                          @endif</td>
                      <td>
                        <a href="{{route('users.delete', ['id' => $user->id])}}"><button class="btn btn-danger">delete</button></a>
                        <a href="{{route('users.edit', ['id' => $user->id])}}"><button class="btn btn-primary">edit</button></a>
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