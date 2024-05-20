@include('company.layouts.head')
@extends('company.layouts.master')
@extends('company.sidebar.sidebar')
@section('content')
<style>
.notification-green {
color: green;
padding: 1.5px;
}
.notification-red {
color:red;
padding: 1.5px;
}
</style>
<section class="content">
<div class="card card-primary">
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
   <div class="card-header">
      <h3 class="card-title">All Companies List Detail</h3>
   </div>
   <table  id="main_form" class="table table-bordered table-striped">
      <thead>
         <tr>
            <th>S.No</th>
            <th>Company Name</th>
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
         @foreach ($all_companies_list as $company)
         <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $company->company_name }}</td>
            <td>{{ $company->address }}</td>
            <td>{{ $company->phone_no }}</td>
            <td>{{ $company->city }}</td>
            <td>{{ $company->state }}</td>
            <td>{{ $company->country }}</td>
            <td>{{ $company->pin_code }}</td>
            <td>{{ $company->status }}</td>
            <td>
               @if(!empty($company->image) && file_exists(public_path('uploads/company/images/'.$company->image)))
               <img src="{{ asset('public/uploads/company/images/'.$company->image) }}" width="70px" height="50px" alt="">
               @endif
            </td>
            <td class="project-actions text-left">
               <a class="btn btn-info btn-sm" href="{{ url('company/edit-company',$company->id) }}">
               <i class="fas fa-pencil-alt">
               </i>
               Edit
               </a>
               <a class="btn btn-danger btn-sm" href="{{ url('company/delete-company',$company->id) }}">
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