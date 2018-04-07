jQuery(document).ready(function($) {
	$("#login").on('click', function () {
		var email = $("#email").val();
		var password = $("#password").val();
		if (email == "" || password == "") {
			alert("Intente de nuevo - son iguales");
		}else {
			$.ajax(
		{
        	url: 'login.php',
        	method: 'POST',
        	data: {
        		login: 1,
        		emailPHP: email,
        		passwordPHP: password
        	},
        	success: function (response) {
        		$("#response").html(response);
        		if (response.indexOf('success') >= 0) {
        			window.location = 'hidden.php';
        		}
        	},
        	datatype: 'text'
		});
		}
		
	});
});