@include('customer.layouts.head')
@extends('customer.layouts.master')
@extends('customer.sidebar.sidebar')
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
      <a href="{{ url('customer/all-employees-list') }}" class="btn btn-primary">All Employees List</a>
   </div>
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Edit Employee</h3>
      </div>
      <form action="{{ route('customer.update.employees', $employees->id) }}" method="post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="name">F Name</label>
               <input type="text" name="first_name" value="{{$employees->first_name}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="name">L Name</label>
               <input type="text" name="last_name" value="{{$employees->last_name}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" value="{{$employees->email}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="phone_no">Phone No</label>
               <input type="text" name="phone_no" value="{{$employees->phone_no}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="city">City</label>
               <input type="text" name="city" value="{{$employees->city}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="state">State</label>
               <input type="text" name="state" value="{{$employees->state}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="country">Country</label>
               <input type="text" name="country" value="{{$employees->country}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="pin_code">Pin Code</label>
               <input type="text"  name="pin_code" value="{{$employees->pin_code}}" class="form-control" required>
            </div>
            <div>
            <label for="image">Image</label>
               <input type="file" name="image" class="form-control" value=""><br><br>      
            </div>
            <div>
            @if(!empty($employees->image) && file_exists(public_path('uploads/customer/employees/'.$employees->image)))
               <img src="{{ asset('public/uploads/customer/employees/'.$employees->image) }}" width="150px" height="130px" alt="">
               @else
                    No Image Available
               @endif
              </div><br><br>
            <div class="form-group">
               <label for="status">Status</label>
               <select id="status" name="status" class="form-control" >
               <option value="active" @if($employees->status == 'active') selected @endif>Active</option>
                  <option value="pending" @if($employees->status == 'pending') selected @endif>Pending</option>
                  <option value="draft" @if($employees->status == 'draft') selected @endif>Draft</option>
                  <option value="publish" @if($employees->status == 'publish') selected @endif>Publish</option>
                  <option value="suspend" @if($employees->status == 'suspend') selected @endif>Suspend</option>
               </select>
            </div>
            <div class="form-check">
               <input type="reset" class="btn btn-danger submit_form" value="Cancel">
               <input type="submit" class="btn btn-success submit_form" name="submit" value="Update">
               <label class="form-check-label" for="examplesubmit"></label>
            </div>
         </div>
   </div>
   </form>
</div>
</section>
@endsection