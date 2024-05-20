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
      <a href="{{url('project/all-projects-list')}}" class="btn btn-primary">All Projects List</a>
   </div>
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Edit Project</h3>
      </div>
      <form action="{{ route('project.update.project', $projects->id) }}" method="post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="project_name">Project Name</label>
               <input type="text" name="project_name" value="{{$projects->project_name}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="address">Address</label>
               <input type="text" name="address" value="{{$projects->address}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="state">State</label>
               <input type="text" name="state" value="{{$projects->state}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="country">Country</label>
               <input type="text" name="country" value="{{$projects->country}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="pin_code">Pin Code</label>
               <input type="text"  name="pin_code" value="{{$projects->pin_code}}" class="form-control" required>
            </div>
            <div>
               <input type="file" name="image" value=""><br><br>      
            </div>
            <div>
            @if(!empty($projects->image) && file_exists(public_path('uploads/technology/projects/'.$projects->image)))
               <img src="{{ asset('public/uploads/technology/projects/'.$projects->image) }}" width="70px" height="50px" alt="">
            @else
                No Image Available
            @endif
               </div><br>
            <div class="form-group">
               <label for="status">Status:</label>
               <select id="status" name="status" class="form-control" >
                  <option value="active" @if($projects->status == 'active') selected @endif>Active</option>
                  <option value="pending" @if($projects->status == 'pending') selected @endif>Pending</option>
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