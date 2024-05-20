//submit contacts form
$(document).ready(function() {
    $('.submit-btn').click(function(event) {
        event.preventDefault();

        var formData = $('#contact').serialize(); 

        //Ajax 
        $.ajax({
            type: "POST",
            url: baseUrl + "/submit-contact", 
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Handle success response
                console.log(response); 
                alert("Message sent successfully!");
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText); 
                alert("Error occurred. Please try again later."); 
            }
        });
    });
});
