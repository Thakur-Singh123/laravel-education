@include('admin.layouts.head')
@extends('admin.layouts.master')
@extends('admin.sidebar.sidebar')
@section('content')
<section class="content">
@if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
@endif
<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">View All Teacher Details:</h3>
   </div>
   <table class="table table-bordered table-striped">
      <thead>
         <tr>
            <th>Sr.No</th>
            <th>Teacher Name</th>
            <th>Student Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>
               Action
            </th>
         </tr>
      </thead>
      <tbody>
         @php $count = 1; @endphp
         @foreach ($all_teacher_lists as $list)
         @foreach($list['student_detail'] as $student)
         <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $list['teacher_name'] }}</td>
            <td>{{ $student['student_name'] }}</td>
            <td>{{ $list['address'] }}</td>
            <td>{{ $list['phone'] }}</td>
            <td>
               <a class="btn btn-info btn-sm" href="{{ url('admin/edit-teacher/'.$list['id']) }}">
               <i class="fas fa-pencil-alt">
               </i>
               Edit
               </a>
               <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-teacher/'.$list['id']) }}">
               <i class="fas fa-trash">
               </i>
               Delete
               </a>
            </td>
         </tr>
         @endforeach
         @endforeach
      </tbody>
   </table>
</div>
</body>
</html>
@endsection