$(document).ready(function ()
{

    $('#login').on('click', function Login()
    {
        var uname = $('#uname').val();
        var psw = $('#psw').val();
       
        $.ajax(
            {
                url: '../login.php',
                method: 'POST',
                data:
                {
                    loggedIn: 1,
                    logIn: 1,
                    uname: uname,
                    password: psw
                },
                success: function(response)
                {
                    // window.location.href = "../index.php";
                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    console.log(msg);
                },
                dataType: 'text'
            }
        )

    })


})