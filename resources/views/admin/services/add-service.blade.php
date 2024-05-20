@include('admin.layouts.head')
@extends('admin.layouts.master')
@extends('admin.sidebar.sidebar')
@section('content')

    <section class="content">
    @if (session('status'))
    <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Add New Service Details:</h3>
            </div>
            <form action ="{{route('service.submit')}}" method = "post" enctype="multipart/form-data">
            @csrf 
            <div class="card-body">       
                <div class="form-group">
                  <label for="name">Title:</label>
                  <input type="text" name="title" value="" class="form-control" required>
                </div>                 
                <div class="form-group">
                  <label for="description">Description:</label>
                  <input type="text"  name="description" value="" class="form-control" required>
                </div>    
                <div class="form-group">
                  <label for="start_date">Start Date:</label>
                  <input type="date" id="id" name="start_date" value="" class="form-control" required>
                </div>        
                <div class="form-group">
                  <label for="end_date">End Date:</label>
                  <input type="date" id="id"  name="end_date" value="" class="form-control" required>
                </div>                           
                <div class="form-group">
                  <label for="regular_price">Regular Price:</label>
                  <input type="text"  name="regular_price" value="" class="form-control" required>
                </div>        
                                                           
                <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" >
                <option value="active">Active</option>
                <option value="pending">Pending</option>
                  </select>
                </div>                 
                  <input type="file" name="image" value=""><br><br>        
                <div class="form-check">
                  <input type="submit" class="form-check-input" name="submit" value="save">
                  <label class="form-check-label" for="examplesubmit"></label>
                </div>
              </div>
			  </div>
            </form>
          </section> 
          @endsection