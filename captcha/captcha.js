$(function(){
// 	$("body").on("click", "#refreshimg", function(){
// 		$.post("captcha/newsession.php");
// 		$("#captchaimage").load("captcha/image_req.php");
// 		return false;
// 	});
	$("body").on("click", "#refreshimg", function(){
	    $.ajax({
            url: "captcha/newsession.php",
            type: "POST",
            success:function(data){
                $("#captchaimage").load("captcha/image_req.php");
            },
            error:function (){}
        });
	});

	$("#contact_form").validate({
		rules: {
			captcha: {
				required: true,
				remote: "captcha/process.php"
			}
		},
		messages: {
			captcha: "Correct captcha is required. Click the captcha to generate a new one"
		},
		submitHandler: function() {
			//alert("Correct captcha!");
		},
		success: function() {
			//$('#captcha-info').addClass("valid").text("Valid captcha!")
		},
		onkeyup: false
	});

});
