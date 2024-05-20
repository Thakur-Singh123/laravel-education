<?php //echo "<br>"; print_r($data);?>
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
           
            <h3 class="card-title">View All Employers Details:</h3>
           
            </div>
<table class="table table-bordered table-striped">

    <thead>
      <tr>
        <th>ID:</th>
        <th>First Name:</th>       
        <th>Last Name:</th> 
        <th>Email:</th>
        <th>Mobile:</th>         
        <th>Address:</th>
        <th>Start Date:</th>
        <th>End Date:</th>
        <th>Status:</th>        
        <th><center>Action:</center></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($data as $row)
      <tr>
      <td>{{ $row->id }}</td>
      <td>{{ $row['employee_detail']['first_name'] }}</td>

      <td>{{ $row->email }}</td>
      <td>{{ $row->mobile }}</td>
      <td>{{ $row->address }}</td>
      <td>{{ $row->start_date }}</td>
      <td>{{ $row->end_date }}</td>
      <td>{{ $row->status }}</td>    
      <td><a href="{{ url('edit-employers/'.$row['id']) }}">Edit</a></td>
      <td><button class="deleteProduct" data-id="{{ $row['id'] }}" data-token="{{ csrf_token() }}" >Delete</button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</body>
</html>
@endsection