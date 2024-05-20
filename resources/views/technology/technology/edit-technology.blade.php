@include('technology.layouts.head')
@extends('technology.layouts.master')
@extends('technology.sidebar.sidebar')
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
      <a href="{{ url('technology/all-technologies-list') }}" class="btn btn-primary">All Technologies List</a>
   </div>
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Edit Technology</h3>
      </div>
      <form action="{{ route('technology.update.technology', $technologies->id) }}" method="post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name" value="{{$technologies->name}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="address">Address</label>
               <input type="text" name="address" value="{{$technologies->address}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="phone_no">Phone No</label>
               <input type="text" name="phone_no" value="{{$technologies->phone_no}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="city">City</label>
               <input type="text" name="city" value="{{$technologies->city}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="state">State</label>
               <input type="text" name="state" value="{{$technologies->state}}"class="form-control" required>
            </div>
            <div class="form-group">
               <label for="country">Country</label>
               <input type="text" name="country" value="{{$technologies->country}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="pin_code">Pin Code</label>
               <input type="text" name="pin_code" value="{{$technologies->pin_code}}" class="form-control" required>
            </div>
            <div class="form-group">
            <label for="image">Image</label>
               <input type="file" name="image" class="form-control" value=""><br><br>      
            </div>
            <div class="form-group">
            @if(!empty($technologies->image) && file_exists(public_path('uploads/technology/images/'.$technologies->image)))
               <img src="{{ asset('public/uploads/technology/images/'.$technologies->image) }}" width="150px" height="130px" alt="">
               @else
                    No Image Available
               @endif
              </div><br><br>
            <div class="form-group">
               <label for="status">Status</label>
               <select id="status" name="status" class="form-control" >
                  <option value="active" @if($technologies->status == 'active') selected @endif>Active</option>
                  <option value="pending" @if($technologies->status == 'pending') selected @endif>Pending</option>
               </select>
            </div>
            <div class="form-check">
               <input type="reset" class="btn btn-danger submit_form" value="Cancel">
               <input type="submit" class="btn btn-success submit_form" name="submit" value="update">
               <label class="form-check-label" for="examplesubmit"></label>
            </div>
         </div>
   </div>
   </form>
</section>
</div>
@endsection