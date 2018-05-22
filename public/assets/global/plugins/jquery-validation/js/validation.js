jQuery.validator.setDefaults(
    {
        debug: true,
        success: "valid",
    });
$(document).ready(function() {
    $("#form_sample_1").validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            phone: {
                required: true,
                minlength: 10,
                maxlength: 11
            },
            address: {
                required: true,
                minlength: 2
            },           
            dob: "required",
            gender: "required"
        },
    });
});
