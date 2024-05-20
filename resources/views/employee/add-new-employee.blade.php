@include('employee.layouts.head')
@extends('employee.layouts.master')
@extends('employee.sidebar.sidebar')
@section('content')
<style>
   .notification-green {
   color: green;
   padding: 1.5px;
   }
   .notification-red {
   color:red;
   padding: 1.5px;
   }
</style>
<section class="content">
   <div class="card card-primary">
      @if (Session::has('success')) 
      <div class="notification-green">
         <p>{{ Session::get('success') }}</p>
      </div>
      @endif 
      @if (Session::has('unsuccess')) 
      <div class="notification-red">
         <p>{{ Session::get('unsuccess') }}</p>
      </div>
      @endif 
      <div class="card-header">
         <h3 class="card-title">Add New Employee</h3>
      </div>
      <form action="{{ route('employee.submit.employee') }}" method="post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="first_name">First Name</label>
               <input type="text" name="first_name" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="last_name">Last Name</label>
               <input type="text" name="last_name" value="" class="form-control" required >
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="phone">Phone No</label>
               <input type="text" name="phone_no" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="city">City</label>
               <input type="text" name="city" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="state">State</label>
               <input type="text" name="state" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="country">Country</label>
               <input type="text" name="country" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="pin_code">Pin Code</label>
               <input type="text"  name="pin_code" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="status">Status:</label>
               <select id="status" name="status" class="form-control" >
                  <option>Select Status Type</option>
                  <option value="active">Active</option>
                  <option value="pending">Pending</option>
               </select>
            </div>
            <div>
               <input type="file" name="image" value=""><br><br>      
            </div>
            <div class="form-check">
               <input type="reset" class="btn btn-danger submit_form" value="Cancel">
               <input type="submit" class="btn btn-success submit_form" name="submit" value="Save">
               <label class="form-check-label" for="examplesubmit"></label>
            </div>
         </div>
   </div>
   </form>
</section>
@endsection