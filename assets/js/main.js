$(function() {
	$('#additional-info').hide();

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

	$("#user-types").change(function() {
		var ddl = document.getElementById("user-types");
		var selectedOption = ddl.options[ddl.selectedIndex].value;
		if (selectedOption == "City Official") {
			$('#additional-info').show();
		} else {
			$('#additional-info').hide();
		}
	});

});
