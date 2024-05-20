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
         <h3 class="card-title">Edit Student Detail:</h3>
      </div>
      <form action="{{route('admin.update.student', $students->id)}}" method="POST" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="teacher_name">Teacher Name</label>
               <select name="teacher_id" id="teacher_id" class="form-control">
                  <option value="">Select Teacher</option>
                  @foreach ($get_teachers as $teacher)
                  <option value="{{ $teacher->id }}" {{ $teacher->id == $students->teacher_id ? 'selected' : '' }}>
                  {{ $teacher->teacher_name }}
                  </option>
                  @endforeach
               </select>
            </div>
            <div class="form-group">
               <label for="student_name">Student Name</label>
               <input type="text" name="student_name" value="{{$students->student_name}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="phone">Phone</label>
               <input type="text" name="phone" value="{{$students->phone}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="address">Address</label>
               <input type="text" name="address" value="{{$students->address}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="city">City</label>
               <input type="text" name="city" value="{{$students->city}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="status">Status:</label>
               <select id="status" name="status" class="form-control" >
               <option value="active" @if($students->status == 'active') selected @endif>Active</option>
               <option value="pending" @if($students->status == 'pending') selected @endif>Pending</option>
               </select>
            </div>
            <div class="form-check">
               <input type="submit" class="btn btn-success submit_form" name="submit" value="Update">
               <label class="form-check-label" for="examplesubmit"></label>
            </div>
         </div>
   </div>
   </form>
</section>
@endsection