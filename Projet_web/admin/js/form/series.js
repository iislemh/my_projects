$().ready(function() {
    $.validator.setDefaults({
        submitHandler: function() {
            var formData = $("#subscribeForm").serialize();
            $.ajax({
                type: "POST",
                url: "php/queries/insert.php",
                cache: false,
                data: formData,
                success: onSuccess,
                error: onError
            });
            return false;
        }
    });
    $("#subscribeForm").validate({
        rules: {
            subscriberShip: "required",
            name: "required",
            firstname: "required",
            password: {
                required: true,
                minlength: 5
            },
            password2: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            username: {
                required: true,
                minlength: 2
            },
            telHome: {
                required: true,
                minlength: 9,
                digits: true
            },
            telMobile: {
                required: true,
                minlength: 9,
                digits: true
            },
            neighborhood: {
                minlength: 2
            },
            city: {
                minlength: 2
            },
            country: {
                minlength: 2
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            lastname: {
                required: "Veuillez specifier votre nom."
            },
            firstname: "Please enter your firstname",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            password2: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            },
            username: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },
            telHome: {
                required: "Please enter your phone number",
                minlength: "Your phone number must be at least 9 characters long",
                digits: "numbers only"
            },
            telMobile: {
                required: "Please enter your phone number",
                minlength: "Your phone number must be at least 9 characters long",
                digits: "numbers only"
            },
            neighborhood: {
                minlength: "It must be at least 2 characters long"
            },
            city: {
                minlength: "It must be at least 2 characters long"
            },
            country: {
                minlength: "It must be at least 2 characters long"
            },
            email: "Please enter a valid email address"
        }
    });
});

