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
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{$url}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{old('name',$user->name)}}">
                    <span class="text-danger">
                      @error('name')
                      {{$message}}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{old('email',$user->email)}}">
                    <span class="text-danger">
                      @error('email')
                      {{$message}}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <span class="text-danger">
                      @error('password')
                      {{$message}}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group">
                    <label>Role</label>
                    <select class="form-control select2" name="role" style="width: 100%;">
                      <option value=1 {{$user->role == "1" ? "selected" : ""}}>Super Admin</option>
                      <option value=2 {{$user->role == "2" ? "selected" : ""}}>Admin</option>
                      <option value=3 {{$user->role == "3" ? "selected" : ""}}>Marketing Executive</option>
                    </select>
                    <span class="text-danger">
                      @error('role')
                      {{$message}}
                      @enderror
                    </span>
                  </div> 
                  <div class="form-group">
                    <label for="">Gender</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="M" name="gender"
                          {{$user->gender == "M" ? "checked" : ""}} />
                          <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="F" name="gender" {{$user->gender == "F" ? "checked" : ""}} />
                          <label class="form-check-label">Female</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="O" name="gender" {{$user->gender == "O" ? "checked" : ""}} />
                          <label class="form-check-label">Other</label>
                        </div>
                        <span class="text-danger">
                          @error('gender')
                          {{$message}}
                          @enderror
                        </span>
                  </div>
                  <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" rows="3" placeholder="Enter ..." >{{old('address',$user->address)}}</textarea>
                  </div>                                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
    	
    </div>
    <!-- /.row (main row) -->
@endsection