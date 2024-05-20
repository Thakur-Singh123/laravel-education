@include('company.layouts.head')
@extends('company.layouts.master')
@extends('company.sidebar.sidebar')
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
         <h3 class="card-title">Edit Company</h3>
      </div>
      <form action="{{ route('company.update.company', $companies->id) }}" method="post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="company_name">Company Name</label>
               <input type="text" name="company_name" value="{{$companies->company_name}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" value="{{$companies->email}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="address">Address</label>
               <input type="text" name="address" value="{{$companies->address}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="phone_no">Phone No</label>
               <input type="text" name="phone_no" value="{{$companies->phone_no}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="city">City</label>
               <input type="text" name="city" value="{{$companies->city}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="state">State</label>
               <input type="text" name="state" value="{{$companies->state}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="country">Country</label>
               <input type="text" name="country" value="{{$companies->country}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="pin_code">Pin Code</label>
               <input type="text"  name="pin_code" value="{{$companies->pin_code}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="status">Status:</label>
               <select id="status" name="status" class="form-control" >
                  <option value="active" @if($companies->status == 'active') selected @endif>Active</option>
                  <option value="pending" @if($companies->status == 'pending') selected @endif>Pending</option>              
               </select>
            </div>
            <div>
               <input type="file" name="image" value=""><br><br>   
               @if(!empty($companies->image) && file_exists(public_path('uploads/company/images/'.$companies->image)))
               <img src="{{ asset('public/uploads/company/images/'.$companies->image) }}" width="100px" height="90px" alt="">
               @endif   
            </div><br>
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