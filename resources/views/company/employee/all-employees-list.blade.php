@include('company.layouts.head')
@extends('company.layouts.master')
@extends('company.sidebar.sidebar')
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
   <a href="{{ url('company/add-new-employee') }}" class="btn btn-primary">Add New Employee</a>
</div>
<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">All Employees List</h3>
   </div>
   <table  id="main_form" class="table table-bordered table-striped">
      <thead>
         <tr>
            <th>S.No</th>
            <th>F Name</th>
            <th>L Name</th>
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
         @foreach ($get_employees_lists as $list)
         <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $list->first_name }}</td>
            <td>{{ $list->last_name }}</td>
            <td>{{ $list->email }}</td>
            <td>{{ $list->phone_no }}</td>
            <td>{{ $list->city }}</td>
            <td>{{ $list->state }}</td>
            <td>{{ $list->country }}</td>
            <td>{{ $list->pin_code }}</td>
            <td>{{ $list->status }}</td>
            <td>
               @if(!empty($list->image) && file_exists(public_path('uploads/company/employees/'.$list->image)))
               <img src="{{ asset('public/uploads/company/employees/'.$list->image) }}" width="70px" height="50px" alt="">
               @else
                    No Image Available
               @endif
            </td>
            <td class="project-actions text-left">
               <a class="btn btn-info btn-sm" href="{{ url('company/edit-employee', $list->id) }}">
               <i class="fas fa-pencil-alt">
               </i>
               Edit
               </a>
               <a class="btn btn-danger btn-sm" href="{{ url('company/delete-employee', $list->id) }}">
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