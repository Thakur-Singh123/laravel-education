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
         <h3 class="card-title">Edit Trainer</h3>
      </div>
      <form action="{{ route('company.update.trainer', $trainers->id) }}" method="post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name" value="{{$trainers->name}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" value="{{$trainers->email}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="gender">Gender</label><br>
               <input type="radio" id="male" name="gender" value="male" {{ $trainers->gender == 'male' ? 'checked' : '' }}>
               <label for="male">Male</label><br>
               <input type="radio" id="female" name="gender" value="female" {{ $trainers->gender == 'female' ? 'checked' : '' }}>
               <label for="female">Female</label><br>
               <input type="radio" id="other" name="gender" value="other" {{ $trainers->gender == 'other' ? 'checked' : '' }}>
               <label for="other">Other</label><br>
            </div>
            <div class="form-group">
               <label for="phone_no">Phone No</label>
               <input type="text" name="phone_no" value="{{$trainers->phone_no}}" class="form-control" required >
            </div>
            <div class="form-group">
               <label for="city">City</label>
               <input type="text" name="city" value="{{$trainers->city}}" class="form-control">
            </div>
            <div class="form-group">
               <label for="state">State</label>
               <input type="text" name="state" value="{{$trainers->state}}" class="form-control">
            </div>
            <div class="form-group">
               <label for="country">Country</label>
               <input type="text" name="country" value="{{$trainers->country}}" class="form-control">
            </div>
            <div class="form-group">
               <label for="pin_code">Pin Code</label>
               <input type="text" name="pin_code" value="{{$trainers->pin_code}}" class="form-control">
            </div>
            <div class="form-group">
               <label for="image">Image</label>
               <input type="file" name="image" class="form-control" value="">     
            </div>
            <div>
               @if(!empty($trainers->image) && file_exists(public_path('uploads/company/traineries/'.$trainers->image)))
               <img src="{{ asset('public/uploads/company/traineries/'.$trainers->image) }}" width="70px" height="50px" alt="">
               @else
               No Image Available
               @endif
            </div>
            <div class="form-group">
               <label for="status">Status</label>
               <select id="status" name="status" class="form-control" >
                  <option value="active" @if($trainers->status == 'active') selected @endif>Active</option>
                  <option value="pending" @if($trainers->status == 'pending') selected @endif>Pending</option>
                  <option value="suspend" @if($trainers->status == 'suspend') selected @endif>Suspend</option>
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
</section>
@endsection