@include('admin.layouts.head')
@extends('admin.layouts.master')
@extends('admin.sidebar.sidebar')
@section('content')
<style>
   .notifaction-green {
   color: green; 
   padding: 2px; 
   margin-bottom: 1px; 
   }
   .notifaction-red {
   color: red;
   padding: 2px; 
   margin-bottom: 1px; 
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
<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">View All Contacts List</h3>
   </div>
   <table class="table table-bordered table-striped">
      <thead>
         <tr>
            <th>Sr.No</th>
            <th>Email</th>
      </thead>
      <tbody>
         @php $count = 1; @endphp
         @foreach ($allContactLists as $list)
         <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $list->email }}</td>
            @endforeach
      </tbody>
   </table>
</div>
</body>
</html>
@endsection