@include('admin.layouts.head')
@extends('admin.layouts.master')
@extends('admin.sidebar.sidebar')
@section('content')

    <section class="content">
   	
    @if (Session::has('success')) 
                     <div class="notifaction-green">
                        <p>{{ Session::get('success') }}</p>
                     </div>
                     @endif 
                     @if (Session::has('unsuccess')) 
                     <div class="notifaction-red">
                        <p> {{ Session::get('unsuccess') }}</p>
                     </div>
					  @endif 
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Add New Employers Details:</h3>
            </div>
            <form action="{{route('submit.employers')}}" method="POST" enctype="multipart/form-data">
            @csrf 
            <div class="card-body">    
            <input type="hidden" name="employee_id" value="">
                
                <div class="form-group">
                  <label for="first_name">First Name:</label>
                  <input type="text"  name="first_name" value="" class="form-control" required>
                </div> 
                <div class="form-group">
                  <label for="last_name">Last Name:</label>
                  <input type="text"  name="last_name" value="" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email"  name="email" value="" class="form-control" required>
                </div>      
                <div class="form-group">
                  <label for="mobile">Mobile:</label>
                  <input type="text"  name="mobile" value="" class="form-control" required>
                </div>                                      
                <div class="form-group">
                  <label for="address">Address:</label>
                  <input type="text"  name="address" value="" class="form-control" required>
                </div>                     
                <div class="form-group">
                  <label for="start_date">Start Date:</label>
                  <input type="date" id="date"  name="start_date" value="" class="form-control" required>
                </div>                           
                <div class="form-group">
                  <label for="end_date">End Date:</label>
                  <input type="date" id="date"  name="end_date" value="" class="form-control" required>
                </div>                      
                <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" >
                <option value="active">Active</option>
                <option value="pending">Pending</option>
                    </select>
                </div>             
                <div class="form-check">
                  <input type="submit" class="btn btn-success submit_form" name="submit" value="submit">
                 
                  <label class="form-check-label" for="examplesubmit"></label>
                </div>
              </div>
			  </div>
            </form>
          </section> 
           @endsection