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
   .col-md-18.text-right {
   margin: 5px;
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
      <div class="col-md-18 text-right">
      <a href="{{ url('company/all-products') }}" class="btn btn-primary">All Products</a>
    </div> 
      <div class="card-header">
         <h3 class="card-title">Edit Project</h3>
      </div>
      <form action="{{ route('company.update.products', $products->id) }}" method="post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="company_name">Name</label>
               <input type="text" name="name" value="{{$products->name}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="address">Address</label>
               <input type="text" name="address" value="{{$products->address}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="phone_no">Phone No</label>
               <input type="text" name="phone_no" value="{{$products->phone_no}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="city">City</label>
               <input type="text" name="city" value="{{$products->city}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="state">State</label>
               <input type="text" name="state" value="{{$products->state}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="country">Country</label>
               <input type="text" name="country" value="{{$products->country}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="pin_code">Pin Code</label>
               <input type="text"  name="pin_code" value="{{$products->pin_code}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="status">Status:</label>
               <select id="status" name="status" class="form-control" >
                  <option value="active" @if($products->status == 'active') selected @endif>Active</option>
                  <option value="pending" @if($products->status == 'pending') selected @endif>Pending</option>
               </select>
            </div>
            <div>
               <input type="file" name="image" value=""><br><br>      
            </div>
            <div>
            @if(!empty($products ->image) && file_exists(public_path('uploads/company/product/images/'.$products ->image)))
               <img src="{{ asset('public/uploads/company/product/images/'.$products ->image) }}" width="150px" height="130px" alt="">
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
</div>
@endsection