$(document).ready(function(){
	$(".login-submit-btn").click(function(e){
		e.preventDefault();
		var username = btoa($("#login-email").val());
		var password = btoa($("#login-password").val());
		$.ajax({
			type : "POST",
			url : "php/login.php",
			data : {
				username : username,
				password : password
			},
			cache : false,

			beforeSend : function(){
				$(".login-submit-btn").html("Processing please wait...");
				$(".login-submit-btn").attr("disabled","disabled");
			},
			success : function(response)
			{
				if(response.trim() == "login success")
				{
					window.location = "profile/profile.php";
				}

				else if(response.trim() == "login pending")
				{
					$("#login-form").fadeOut(500,function(){
						$(".login-activator").removeClass("d-none");
						$(".login-activate-btn").click(function(){
							$.ajax({
								type : "POST",
								url : "php/activator.php",
								data : {
									code : btoa($("#login-code").val()),
									username : btoa($("#login-email").val())
								},
								beforeSend : function(){
									$(".login-activate-btn").html("Please wait we are checking...");
									$(".login-activate-btn").attr("disabled","disabled");
								},
								success : function(response){
									if(response.trim() == "user verified")
									{
										window.location = "profile/profile.php";
									}

									else{
										$(".login-activate-btn").html("Activate now");
										$(".login-activate-btn").removeAttr("disabled");
										$("#login-code").val("");
										var notice = document.createElement("DIV");
										notice.className = "alert alert-warning";
										notice.innerHTML = "<b>Wrong activation code</b>";
										$(".login-notice").append(notice);
										setTimeout(function(){
											$(".login-notice").html("");
										},5000);


									}

									




								}

							});
						});
					});
				}

				else if(response.trim() == "wrong password")
				{
					var message = document.createElement("DIV");
					message.className = "alert alert-warning";
					message.innerHTML = "<b>Wrong password</b>";
					$(".login-notice").append(message);
					$("#login-form").trigger('reset');
					$(".login-submit-btn").html("Login now");
					$(".login-submit-btn").removeAttr("disabled");
					setTimeout(function(){
						$(".login-notice").html("");
					},5000);
				}

				else
				{
					message = document.createElement("DIV");
					message.className = "alert alert-warning";
					message.innerHTML = "<b>User not found please sign up</b>";
					$(".login-notice").append(message);
					$("#login-form").trigger('reset');
					$(".login-submit-btn").html("Login now");
					$(".login-submit-btn").removeAttr("disabled");
					setTimeout(function(){
						$(".login-notice").html("");
					},5000);
				}
			}
		});
	});
});