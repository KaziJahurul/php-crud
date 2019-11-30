$(document).ready(function() {
    'use strict';

    // var data = {};
    // var jsonData = {};
    // console.log(jsonData);

    $('#loginform').submit(function(e) {
        e.preventDefault();

        var dataArr = [];
        $.ajax({
            type: "POST",
            url: 'login.php',
            data: $(this).serialize(),
            // dataType: "json",
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                console.log(jsonData);
                // var data = jsonData.success;
                // console.log(data);
                // $( "body" ).append( "<p>" + jsonData + "</p>");
                

                
 
                // user is logged in successfully in the back-end
                // let's redirect
                // if (jsonData.success == "1")
                // {
                //     location.href = 'create.php';
                // }
                // else
                // {
                //     alert('Invalid Credentials!');
                // }
           }
       });
    
     });
});