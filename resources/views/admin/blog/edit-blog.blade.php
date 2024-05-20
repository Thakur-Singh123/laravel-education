<?php //echo"<br>";print_r($data);?>
@include('admin.layouts.head')
@extends('admin.layouts.master')
@extends('admin.sidebar.sidebar')
@section('content')
<style>
  span.x-close-butt {
    position: relative;
    bottom: 32px;
    right: 18px;
}

span.x-close-butt i {
    color: #fff;
}
</style>
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
    
            <h3 class="card-title">Edit Blog Details:</h3>
            </div>
           
            <form action ="{{ route('blog.update',$blog->id) }}" method = "post" enctype="multipart/form-data">
	         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <div class="card-body">
                <div class="form-group">
                  <label for="name">Title:</label>
                  <input type="text" name="title" value="{{$blog->title}}" class="form-control"  placeholder="name" required>
                </div>                     
                <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" >
                <option value="active" <?php if( $blog->status == 'active') echo "selected";?>>Active</option>
                <option value="pending" <?php if( $blog->status == 'pending') echo "selected";?>>Pending</option>
                </select>
                </div>  
                <div class="form-group">
                  <label for="description">Description:</label>
                  <textarea id="message" name="description"  value="{{$blog->description}}" rows="4" cols="50" class="form-control"></textarea><br>
                 </div>                   
                 <input type="file" name="image" value="">
                <img src="{{ asset('public/images/' .$blog['image']) }}" width="100px" height="90px">
                <div class="form-check">
                  <input type="submit" class="form-check-input" name="submit" value="update">
                  <label class="form-check-label" for="examplesubmit"></label>
                </div>
              </div>
            </form>
          </div>
          @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
          </section> 
          @endsection