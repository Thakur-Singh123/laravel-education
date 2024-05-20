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
      <a href="{{ url('admin/export/students') }}" class="btn btn-primary">Export Student Record</a>
      <a href="{{ url('admin/add-students') }}" class="btn btn-primary">Import Student Record</a>
   </div>
<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">View All Student Details:</h3>
   </div>
   <table id="students-table" class="table table-bordered table-striped">
      <thead>
         <tr>
            <th>Sr.No</th>
            <th>Student Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Phone</th>
            <th>Status</th>
            <th>
               <center>Action</center>
            </th>
         </tr>
      </thead>
      <tbody>
         @php $count = 1; @endphp
         @foreach ($all_student_lists as $list)
         <tr>
            <td>{{ $count++ }}</td> 
            <td>{{ $list->student_name }}</td>
            <td>{{ $list->address }}</td>
            <td>{{ $list->city }}</td>
            <td>{{ $list->phone }}</td>
            <td>{{ $list->status }}</td>
            <td>
               <a class="btn btn-info btn-sm" href="{{ url('admin/edit-student/'.$list['id']) }}">
               <i class="fas fa-pencil-alt">
               </i>
               Edit
               </a>
               <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-student/'.$list['id']) }}">
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
@endsection
