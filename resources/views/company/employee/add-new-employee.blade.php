@include('company.layouts.head')
@extends('company.layouts.master')
@extends('company.sidebar.sidebar')
@section('content')
<style>
   .notifaction-green {
   color: green;
   }
   .notification-red {
   color: red;
   }
   .col-md-18.text-right {
   margin: 5px;
   }
</style>
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
   <div class="col-md-18 text-right">
      <a href="{{ url('company/all-employees-list') }}" class="btn btn-primary">All Employees List</a>
   </div>
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Add New Employee</h3>
      </div>
      <form action="{{ route('company.submit.employee') }}" method="post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="first_name">F Name</label>
               <input type="text" name="first_name" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="last_name">L Name</label>
               <input type="text" name="last_name" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="phone_no">Phone No</label>
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
               <input type="text" name="pin_code" value="" class="form-control" required>
            </div>
            <div class="form-group">
            <label for="image">Image</label>
               <input type="file" name="image" class="form-control" value="">     
            </div>
            <div class="form-group">
               <label for="status">Status</label>
               <select id="status" name="status" class="form-control" >
                  <option value="active">Active</option>
                  <option value="pending">Pending</option>
                  <option value="draft">Draft</option>
                  <option value="publish">Publish</option>
                  <option value="suspend">Suspend</option>
               </select>
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