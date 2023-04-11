(function($) {

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    // Set a Cookie
    function setCookie(cName, cValue, expMins) {
        let date = new Date();
        date.setTime(date.getTime() + (expMins * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
    }
	
    $('#submit-form').on( 'click', function(e) {
        e.preventDefault();

        $('.warning').remove();

        const email = $('#exampleInputEmail1').val();

        const emailValidate = isEmail(email);
        if ( email ) {
            if ( ! emailValidate ) {
                $('#exampleInputEmail1').after('<p class="warning text-danger">Email is not valid.</p>');
            }
        } else {
            $('#exampleInputEmail1').after('<p class="warning text-danger">Email field can not be empty.</p>');
        }
        const password = $('#exampleInputPassword1').val();
        if( ! password ) {
            $('#exampleInputPassword1').after('<p class="warning text-danger">Password field can not be empty</p>')
        }

        if ( email && emailValidate && password ) {
            $.ajax({
                url: ajax_object.ajax_url,
                type: 'post',
                data: {
                    action: 'q_symphony_skeleton_api_cb',
                    nonce: ajax_object.nonce,
                    email,
                    password
                },
                success(response) {
                    let token = response.data.token;
                    console.log(response.data.token);

                    // Apply setCookie
                    setCookie('token', token, 30);
                }
            })
        }

        

    })
	
})( jQuery );