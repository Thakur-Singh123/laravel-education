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
      <a href="{{ url('company/add-new-product') }}" class="btn btn-primary">Add New Product</a>
      <a href="{{ url('company/product-export') }}" class="btn btn-primary">Export Product</a>
      <a href="{{ url('company/import-product') }}" class="btn btn-primary">Import Product</a>
    </div>
   <div class="card card-primary"> 
   <div class="card-header">
      <h3 class="card-title">All Product List Detail</h3>
   </div>
   <table  id="main_form" class="table table-bordered table-striped">
      <thead>
         <tr>
            <th>S.No</th>
            <th>Name</th>
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
         @foreach ($get_products_lists as $lists )
         <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $lists ->name }}</td>
            <td>{{ $lists ->address }}</td>
            <td>{{ $lists ->phone_no }}</td>
            <td>{{ $lists ->city }}</td>
            <td>{{ $lists ->state }}</td>
            <td>{{ $lists ->country }}</td>
            <td>{{ $lists ->pin_code }}</td>
            <td>{{ $lists ->status }}</td>
            <td>
               @if(!empty($lists ->image) && file_exists(public_path('uploads/company/product/images/'.$lists ->image)))
               <img src="{{ asset('public/uploads/company/product/images/'.$lists ->image) }}" width="70px" height="50px" alt="">
               @endif
            </td>
            <td class="project-actions text-left">
               <a class="btn btn-info btn-sm" href="{{ url('company/edit-product',$lists ->id) }}">
               <i class="fas fa-pencil-alt">
               </i>
               Edit
               </a>
               <a class="btn btn-danger btn-sm" href="{{ url('company/delete-product',$lists ->id) }}">
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