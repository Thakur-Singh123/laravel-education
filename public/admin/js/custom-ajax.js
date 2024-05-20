//submit data
    $('#form-data').submit(function(event) {
        event.preventDefault();
        //alert('yes'); return false;
        var data = $('#form-data').serialize();
  
        $.ajax({
              type: 'POST',
              url: base_url+'/submit-employers',
              data: data,
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              beforeSend: function(){
                $('.submit').val('Please wait..');
            },
            success: function(response){
                alert(response);
                $('.submit').val('Please wait..');
            }
        });
    });

    //update data
    
    $('#form-data').submit(function(event) {
        event.preventDefault();
        //alert('yes'); return false;
        var data = $('#form-data').serialize();
        var id = $(this).attr('id')
        $.ajax({
              type: 'POST',
              url: base_url+'/update-employers/{id}',
              data: data,
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              beforeSend: function(){
                $('.submit').val('Please wait..');
            },
            success: function(response){
                alert(response);
                $('.submit').val('Please wait..');
            }
        });
    });
 

    //delete data
    $(".deleteProduct").click(function(){
        var id = $(this).data("id");
       // alert(id);return false;
        var token = $(this).data("token");
        $.ajax(
        {
            url: base_url+"/delete-employers",
            type: 'get',
            dataType: "JSON",
            data: {
                "id": id,
            },
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            success: function ()
            {
                console.log("it Work");
            }
        });

        console.log("It failed");
    });

    //Customer product ajax
    //submit customer product form
    $(document).ready(function() {
        $('.prod6ucts').click(function(event) {
            event.preventDefault();
            //alert('yes'); return false;
            
            var formData = $('.product').serialize(); 
    
            // Ajax 
            $.ajax({
                type: "POST",
                url: baseUrl + "/customer/mit-product", 
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Handle success response
                    console.log(response); 
                    alert("Message product created successfully!");
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText); 
                    alert("Error occurred. Please try again later."); 
                }
            });
        });
    });
    