$(document).ready(function(){
	$(".activate-btn").click(function(){
		var code = btoa($("#code").val());
		var username = btoa($("#email").val());
		$.ajax({
			type : "POST",
			url : "php/activator.php",
			data : {
				code : code,
				username : username
			},
			cache : false,

			beforeSend : function(){
				$(".activate-btn").html("Please wait we are checking...");
			},

			success : function(response)
			{
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