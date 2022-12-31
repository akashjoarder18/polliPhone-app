@extends('admin.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Outlets</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Outlets</li>
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
                    <label for="name">Outlet Name</label>
                    <input type="text" class="form-control" id="name" name="outlet_name" placeholder="Enter name" value="{{old('outlet_name',$outlet->outlet_name ?? '')}}">
                    <span class="text-danger">
                      @error('outlet_name')
                      {{$message}}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" rows="3" placeholder="Enter ..." >{{old('address',$outlet->address ?? '')}}</textarea>
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