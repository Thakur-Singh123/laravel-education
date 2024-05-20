<?php //echo"<br>";print_r($data);?>
@include('admin.layouts.head')
@extends('admin.layouts.master')
@extends('admin.sidebar.sidebar')
@section('content')
<style>
  span.x-close-butt {
    position: relative;
    bottom: 32px;
    right: 18px;
}

span.x-close-butt i {
    color: #fff;
}
</style>
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
    
            <h3 class="card-title">Edit Employers Details:</h3>
            </div>
           
            <form id="form-data" enctype="multipart/form-data">
	         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">  
            <div class="card-body">
                <div class="form-group">
                  <label for="name">First Name:</label>
                  <input type="text" name="first_name" value="{{$data->first_name}}" class="form-control">
                </div>   
                <div class="form-group">
                  <label for="name">Last Name:</label>
                  <input type="text" name="last_name" value="{{$data->last_name}}" class="form-control">
                </div>                  
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" name="email" value="{{$data->email}}" class="form-control">
                </div>
                <div class="form-group">
                  <label for="mobile">Mobile:</label>
                  <input type="text" name="mobile" value="{{$data->mobile}}" class="form-control">
                </div>
                <div class="form-group">
                  <label for="name">Address:</label>
                  <input type="text" name="address" value="{{$data->address}}" class="form-control">
                </div>
                <div class="form-group">
                  <label for="name">Start Date:</label>
                  <input type="date" id="date" name="start_date" value="{{$data->start_date}}" class="form-control">
                </div>
                <div class="form-group">
                  <label for="name">End Date:</label>
                  <input type="date" id="date" name="end_date" value="{{$data->end_date}}" class="form-control">
                </div>

                <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" >
                <option value="active" <?php if( $data->status == 'active') echo "selected";?>>Active</option>
                <option value="pending" <?php if( $data->status == 'pending') echo "selected";?>>Pending</option>
                </select>
                </div>                     
                <div class="form-check">
                  <input type="submit" class="form-check-input" name="submit" value="update">
                 
                  <label class="form-check-label" for="examplesubmit"></label>
                </div>
              </div>
            </form>
          </div>
          </section> 
          @endsection