@include('customer.layouts.head')
@extends('customer.layouts.master')
@extends('customer.sidebar.sidebar')
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
         <h3 class="card-title">Edit Customer</h3>
      </div>
      <form action="{{ route('customer.update.customer',$customers->id) }}" method="post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name" value="{{$customers->name}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="address">Address</label>
               <input type="text" name="address" value="{{$customers->address}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="phone">Phone No</label>
               <input type="text" name="phone_no" value="{{$customers->phone_no}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="city">City</label>
               <input type="text" name="city" value="{{$customers->city}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="state">State</label>
               <input type="text" name="state" value="{{$customers->state}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="country">Country</label>
               <input type="text" name="country" value="{{$customers->country}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="pin_code">Pin Code</label>
               <input type="text"  name="pin_code" value="{{$customers->pin_code}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="status">Status:</label>
               <select id="status" name="status" class="form-control" >
                <option value="active" @if($customers->status == 'active') selected @endif>Active</option>
                <option value="pending" @if($customers->status == 'pending') selected @endif>Pending</option> 
               </select>
            </div>
            <div>
               <input type="file" name="image" value=""><br><br>
               @if(!empty($customers->image) && file_exists(public_path('uploads/customer/images/'.$customers->image)))
               <img src="{{ asset('public/uploads/customer/images/'.$customers->image) }}" width="100px" height="80px" alt="">
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