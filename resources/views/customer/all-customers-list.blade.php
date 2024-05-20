@include('customer.layouts.head')
@extends('customer.layouts.master')
@extends('customer.sidebar.sidebar')
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
      <h3 class="card-title">All Customers List Detail</h3>
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
         @foreach ($all_customers_list as $customer)
         <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->phone_no }}</td>
            <td>{{ $customer->city }}</td>
            <td>{{ $customer->state }}</td>
            <td>{{ $customer->country }}</td>
            <td>{{ $customer->pin_code }}</td>
            <td>{{ $customer->status }}</td>
            <td>
               @if(!empty($customer->image) && file_exists(public_path('uploads/customer/images/'.$customer->image)))
               <img src="{{ asset('public/uploads/customer/images/'.$customer->image) }}" width="70px" height="50px" alt="">
               @endif
            </td>
            <td class="project-actions text-left">
               <a class="btn btn-info btn-sm" href="{{ url('customer/edit-customer',$customer->id) }}">
               <i class="fas fa-pencil-alt">
               </i>
               Edit
               </a>
               <a class="btn btn-danger btn-sm" href="{{ url('customer/delete-customer',$customer->id) }}">
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