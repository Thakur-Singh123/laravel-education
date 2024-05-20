@include('admin.layouts.head')
@extends('admin.layouts.master')
@extends('admin.sidebar.sidebar')
@section('content')
<style>
   .notifaction-green {
   background-color: #28a745; 
   color: #fff; 
   padding: 10px; 
   margin-bottom: 10px; 
   }
   .notifaction-red {
   background-color: #dc3545; 
   color: #fff; 
   padding: 10px; 
   margin-bottom: 10px; 
   }
   .notifaction-green p,
   .notifaction-red p {
   margin: 0; 
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
         <h3 class="card-title">Add New Student Details:</h3>
      </div>
      <form action="{{route('admin.submit.student')}}" method="POST" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
         <div class="form-group">
         <label for="teacher_name">Teacher Name</label>
            <select name="teacher_id" class="form-control">
            <label for="teacher_name">Teacher Name</label>
            <option value="">Select Teacher</option>
            @foreach ($get_teachers as $teacher)
               <option value="{{ $teacher->id }}">{{ $teacher->teacher_name }}</option>
            @endforeach
         </select>
          </div>
            <div class="form-group">
               <label for="student_name">Student Name</label>
               <input type="text"  name="student_name" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="phone">Phone</label>
               <input type="text" name="phone" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="address">Address</label>
               <input type="text"  name="address" value="" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="city">City</label>
               <input type="text"  name="city" value="" class="form-control" required>
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