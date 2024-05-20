@include('admin.layouts.head')
@extends('admin.layouts.master')
@extends('admin.sidebar.sidebar')
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
      <a href="{{ url('admin/all-sliders') }}" class="btn btn-primary">All Sliders</a>
   </div> 
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Edit Slider</h3>
      </div>
      <form action="{{route('admin.update.slider', $sliders->id)}}" method="POST" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name" value="{{$sliders->name}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="desc">Description</label>
               <input type="text" name="desc"value="{{$sliders->desc}}" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="image">Image</label>
               <input type="file" name="image" class="form-control">
            </div>
            <div  class="form-group">
                @if(!empty($sliders->image) && file_exists(public_path('uploads/admin/sliders/'.$sliders->image)))
            <img src ="{{asset('public/uploads/admin/sliders/' .$sliders->image)}}" width=150px hight=120px alt="">
            @endif
             </div>
            <div class="form-group">
               <label for="status">Status:</label>
               <select id="status" name="status" class="form-control" >
                  <option value="Active" @if($sliders->status == 'Active') selected @endif>Active</option>
                  <option value="Pending" @if($sliders->status == 'Pending') selected @endif>Pending</option>
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