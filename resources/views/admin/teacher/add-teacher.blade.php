@include('admin.layouts.head')
@extends('admin.layouts.master')
@extends('admin.sidebar.sidebar')
@section('content')
<style>
  span.x-close-butt {
    position: relative;
    bottom: 32px;
    right: 18px;
}

span.x-close-butt i {
    color: #fff;
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
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Add New Teacher Details:</h3>
      </div>
      <form action="{{route('admin.submit.teacher')}}" method="POST" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <input type="hidden" name="employee_id" value="">
            <div class="form-group">
               <label for="teacher_name">Teacher Name</label>
               <input type="text"  name="teacher_name" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="phone">Phone</label>
               <input type="text"  name="phone" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="address">Address</label>
               <input type="text"  name="address" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="status">Status:</label>
               <select id="status" name="status" class="form-control" >
                  <option value="active">Active</option>
                  <option value="pending">Pending</option>
               </select>
            </div>
            <div class="form-check">
               <input type="submit" class="btn btn-success submit_form" name="submit" value="Save">
               <label class="form-check-label" for="examplesubmit"></label>
            </div>
         </div>
   </div>
   </form>
</section>
@endsection