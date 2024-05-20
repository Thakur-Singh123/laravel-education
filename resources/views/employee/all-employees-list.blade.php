@include('employee.layouts.head')
@extends('employee.layouts.master')
@extends('employee.sidebar.sidebar')
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
      <a href="{{ url('employee/export/employee') }}" class="btn btn-primary">Export Employee Record</a>
      <a href="{{ url('employee/add-employee') }}" class="btn btn-primary">Import Employee Record</a>
   </div>
<div class="card card-primary"> 
   <div class="card-header">
      <h3 class="card-title">All Employees List Detail</h3>
   </div>
   <table  id="main_form" class="table table-bordered table-striped">
      <thead>
         <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
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
         @foreach ($all_employees_list as $employee)
         <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone_no }}</td>
            <td>{{ $employee->city }}</td>
            <td>{{ $employee->state }}</td>
            <td>{{ $employee->country }}</td>
            <td>{{ $employee->pin_code }}</td>
            <td>{{ $employee->status }}</td>
            <td>
               @if(!empty($employee->image) && file_exists(public_path('uploads/employee/images/'.$employee->image)))
               <img src="{{ asset('public/uploads/employee/images/'.$employee->image) }}" width="70px" height="50px" alt="">
               @endif
            </td>
            <td class="project-actions text-left">
               <a class="btn btn-info btn-sm" href="{{ url('employee/edit-employee',$employee->id) }}">
               <i class="fas fa-pencil-alt">
               </i>
               Edit
               </a>
               <a class="btn btn-danger btn-sm" href="{{ url('employee/delete-employee',$employee->id) }}">
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