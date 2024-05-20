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
         <h3 class="card-title">Edit Employee Detail</h3>
      </div>
      <form action="{{ route('employee.update.employee', $employees->id) }}" method="post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="first_name">First Name</label>
               <input type="text" name="first_name" value="{{$employees->first_name}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="last_name">Last Name</label>
               <input type="text" name="last_name" value="{{$employees->last_name}}" class="form-control" required >
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" value="{{$employees->email}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="phone">Phone No</label>
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
               <input type="text" name="pin_code" value="{{$employees->pin_code}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="status">Status:</label>
               <select id="status" name="status" class="form-control" >
                  <option value="active" @if($employees->status == 'active') selected @endif>Active</option>
                  <option value="pending" @if($employees->status == 'pending') selected @endif>Pending</option>
               </select>
            </div>
            <div>
               <input type="file" name="image" value=""><br><br>
               @if(!empty($employees->image) && file_exists(public_path('uploads/employee/images/' . $employees->image)))
                <img src="{{ asset('public/uploads/employee/images/' . $employees->image) }}" width="150px" height="130px" alt="">
            @endif      
            </div><br><br>
            <div class="form-check">
               <input type="reset" class="btn btn-danger submit_form" value="Cancel">
               <input type="submit" class="btn btn-success submit_form" name="submit" value="Update">
               <label class="form-check-label" for="examplesubmit"></label>
            </div>
         </div>
   </div>
   </form>
</section>
@endsection