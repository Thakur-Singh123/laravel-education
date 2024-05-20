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
      <a href="{{ url('admin/add-new-slider') }}" class="btn btn-primary">Add New Slider</a>
   </div>
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">All Sliders List</h3>
      </div>
      <table id="myTable" class="table table-bordered table-striped">
         <thead>
            <tr>
               <th>Sr.No</th>
               <th>Name</th>
               <th>Description</th>
               <th>Image</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @php $count = 1; @endphp
            @foreach($get_slider_lists as $list)
            <tr>
               <td>{{ $count++ }}</td>
               <td>{{ $list->name }}</td>
               <td>{{ $list->desc }}</td>
               <td>
               @if(!empty($list->image) && file_exists(public_path('uploads/admin/sliders/'.$list->image)))
               <img src = "{{ asset('public/uploads/admin/sliders/'. $list->image)}}" width="150px" height="130px" alt="">
               @endif
              </td>
               <td>{{ $list->status }}</td>
               <td>
                  <a class="btn btn-info btn-sm" href="{{ url('admin/edit-slider',$list->id) }}">
                  <i class="fas fa-pencil-alt"></i> Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-slider',$list->id) }}">
                  <i class="fas fa-trash"></i> Delete
                  </a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</section>
</div>
@endsection