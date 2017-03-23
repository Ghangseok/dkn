$(function() {
	$.validator.addMethod("lettersonly", function(value, element) {
	  return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Letters only please"); 
	$.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
    }, "Username must contain only letters, numbers, or dashes.");
	
	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});

		// validate signup form on keyup and submit
		$("#signup").validate({
			rules: {
				username: {
					required: true,
					lettersonly: true
				},
				password: {
					required: true,
					minlength: 8
				},
				con_password: {
					required: true,
					minlength: 8,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				tel: {
					required: true,
					number: true,
					phoneUS: true
				},
				name: {
					required: true,
					lettersonly: true
				},
				address: {
					required: true
				},
				city: {
					required: true
				},
				province: {
					required: true
				},
				postal: {
					required: true,
					minlength: 6
				},
				make: {
					required: true,
					loginRegex: true
				},
				model: {
					required: true,
					loginRegex: true
				},
				year: {
					required: true,
					number: true
				}
			},
			messages: {
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long"
				},
				con_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long",
					equalTo: "Please enter the same password"
				},
				email: "Please enter a valid email address",
				name: "Please enter your name",
				tel: {
					required: "Please enter a contact number",
					number: "Please enter a valid conatct number",
					phoneUS: "Please enter a valid conatct number",
				},
				address: "Please enter your address",
				city: "Please enter your city",
				province: "Please enter your province",
				postal: {
					required: "Please provide your postal",
					minlength: "Your postal code must be at least 6 characters long"
				},
				make: "Please enter your make",
				model: "Please enter your model",
				year: {
					required: "Please provide a year",
					number: "Please provide a valid year"
				}
			}
		});


	});