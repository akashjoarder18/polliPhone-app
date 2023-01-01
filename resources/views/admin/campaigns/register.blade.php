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
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
                @if(session('error'))
                <div class="text-danger text-center mb-3">{{session('error')}}</div>
                @endif
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{$url}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Campaign Name</label>
                    <input type="text" class="form-control" id="name" name="campaign_name" placeholder="Enter name" value="{{old('campaign_name',$campaign->campaign_name ?? '')}}">
                    <span class="text-danger">
                      @error('name')
                      {{$message}}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group">
                    <label>Products Select</label>
                    <select class="form-control select2" name="product_id" style="width: 100%;">
                      @foreach ($products as $product)
                      <option value={{$product->product_id}} @isset($campaign) {{$campaign->product_id == $product->product_id ? "selected" : ""}} @endisset >{{$product->product_name}}</option>
                      @endforeach
                    </select>
                    <span class="text-danger">
                      @error('product_id')
                      {{$message}}
                      @enderror
                    </span>
                  </div> 
                  <div class="form-group">
                    <label>Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="date" value="{{old('date',$campaign->date ?? '')}}" data-target="#reservationdate"/>                        
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                                               
                    </div>
                    <span class="text-danger">
                          @error('date')
                          {{$message}}
                          @enderror
                    </span> 
                  </div>
                  
                  <label>Select Marketing Executive For Occasion Campaign:</label>
                  @foreach ($users as $user)
                  <div class="form-group clearfix">
                      <div class="icheck-success d-inline">
                        <input type="checkbox" name="executives[]" value="{{$user->id}}" id="{{$user->id}}">
                        <label for="{{$user->id}}">
                        {{$user->name}}
                        </label>
                      </div>
                      
                  </div>
                  @endforeach
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