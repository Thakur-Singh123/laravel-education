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
            <h3 class="card-title">Add New Blog Details:</h3>
            </div>
            <form action="#" id="form-data" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="card-body">       
                <div class="form-group">
                  <label for="name">Title:</label>
                  <input type="text" name="title" value="" class="form-control" required>
                </div>                 
                <div class="form-group">

                  <label for="description">Description:</label>
                  <input type="text"  name="description" value="" class="form-control" required>
                </div>                       
                                                           
                <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" >
                <option value="active">Active</option>
                <option value="pending">Pending</option>
                  </select>
                </div>                 
                  <input type="file" name="image" value=""><br><br>        
                <div class="form-check">
                  <input type="button" class="btn btn-success submit_form" name="submit" value="Save">
                  <label class="form-check-label" for="examplesubmit"></label>
                </div>
              </div>
			  </div>
            </form>
          </section> 
          
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript"> 
    $('body').on('click', '.submit_form', function() {
        var data = $('#form-data').serialize();
  
        $.ajax({
              type: 'POST',
              url: base_url+'/submit-blog',
              data: data,
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              beforeSend: function(){
                  $('.submit_form').val('Please wait..');
              },
              success: function(response){
                  alert(response);
                  $('.submit_form').val('Please wait..');
              }
          });
      });
</script>
@endsection