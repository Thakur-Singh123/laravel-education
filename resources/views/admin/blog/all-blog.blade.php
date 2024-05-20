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
           
            <h3 class="card-title">View All Blog Details:</h3>
           
            </div>
<table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID:</th>
        <th>Title:</th>       
        <th>Description:</th>          
        <th>Status:</th>
        <th>Image:</th>        
        <th><center>Action:</center></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($blog as $row)
      <tr>
      <td>{{ $row->id }}</td>
      <td>{{ $row->title }}</td>
      <td>{{ $row->description }}</td>
      <td>{{ $row->status }}</td>
      <td><img src="{{ url('public/images/' . $row['image']) }}" width="120px" height="100px"></td>     
      <td><a href="{{ url('edit-blog/'.$row['id']) }}">Edit</a></td>
      <td><a href="{{ url('delete-blog/'.$row['id']) }}">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</body>
</html>
@endsection