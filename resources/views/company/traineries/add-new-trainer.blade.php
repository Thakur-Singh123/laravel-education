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
      <a href="{{ url('company/all-traineries-list') }}" class="btn btn-primary">All Traineries List</a>
   </div>
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Add New Trainer</h3>
      </div>
      <form action="{{ route('company.submit.trainer') }}" method="post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <input type="text" name="name" value="{{ old('name') }}" class="form-control" >
               @error('name')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" value="" class="form-control" >
            </div>
            <div class="form-group">
               <label for="dob">Dob</label>
               <input type="date" id="date" name="dob" value="" class="form-control" >
            </div>
            <div class="form-group">
               <label for="addrees">Addrees</label>
               <input type="text" name="addrees" value="" class="form-control" >
            </div>
            <div class="form-group">
               <label for="gender">Gender</label><br>
               <input type="radio" id="male" name="gender" value="male" checked>
               <label for="male">Male</label><br>
               <input type="radio" id="female" name="gender" value="female">
               <label for="female">Female</label><br>
               <input type="radio" id="other" name="gender" value="other">
               <label for="other">Other</label><br>
            </div>
            <div class="form-group">
               <label for="phone_no">Phone No</label>
               <input type="text" name="phone_no" value="" class="form-control" >
            </div>
            <div class="form-group">
               <label for="city">City</label>
               <input type="text" name="city" value="" class="form-control" >
            </div>
            <div class="form-group">
               <label for="state">State</label>
               <input type="text" name="state" value="" class="form-control" >
            </div>
            <div class="form-group">
               <label for="country">Country</label>
               <input type="text" name="country" value="" class="form-control" >
            </div>
            <div class="form-group">
               <label for="pin_code">Pin Code</label>
               <input type="text" name="pin_code" value="" class="form-control">
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