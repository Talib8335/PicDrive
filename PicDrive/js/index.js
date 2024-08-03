// show password
$(document).ready(function(){
	$(".show-icon").click(function(){
		if($("#password").attr("type") == "password")
		{
			$(this).css({
				color : "black"
			});
			$("#password").attr("type","text");
		}

		else{
			$(this).css({
				color : "#ccc"
			});
			$("#password").attr("type","password");

		}


	});
});