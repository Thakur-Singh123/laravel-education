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
   <a href="{{ url('technology/add-new-technology') }}" class="btn btn-primary">Add New Technology</a>
</div>
<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">All technologies List</h3>
   </div>
   <table  id="main_form" class="table table-bordered table-striped">
      <thead>
         <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Pin Code</th>
            <th>Status</th>
            <th>Image</th>
            <th>
               <center>Action</center>
            </th>
         </tr>
      </thead>
      <tbody>
         @php $count = 1; @endphp
         @foreach ($get_all_technologies_list as $list)
         <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $list->name }}</td>
            <td>{{ $list->email }}</td>
            <td>{{ $list->address }}</td>
            <td>{{ $list->phone_no }}</td>
            <td>{{ $list->city }}</td>
            <td>{{ $list->state }}</td>
            <td>{{ $list->country }}</td>
            <td>{{ $list->pin_code }}</td>
            <td>{{ $list->status }}</td>
            <td>
               @foreach ($list->images as $image)
               @if(!empty($list->images) && file_exists(public_path('uploads/technology/images/'.$image->filename)))
               <img src="{{ asset('public/uploads/technology/images/'.$image->filename) }}" width="70px" height="50px" alt="">
               @endif
               @endforeach
            </td>
            <td class="project-actions text-left">
               <a class="btn btn-info btn-sm" href="{{ url('technology/edit-technology',$list->id) }}">
               <i class="fas fa-pencil-alt">
               </i>
               Edit
               </a>
               <a class="btn btn-danger btn-sm" href="{{ url('technology/delete-technology',$list->id) }}">
               <i class="fas fa-trash">
               </i>
               Delete
               </a>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
</body>
</html>
</div>
@endsection