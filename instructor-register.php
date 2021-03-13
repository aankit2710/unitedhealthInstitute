<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Title -->
<title>United Health Institute : Instructor Register</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="CreativeLayers" content="">
<style>
/* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
    background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

  background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 150ms infinite linear;
  -moz-animation: spinner 150ms infinite linear;
  -ms-animation: spinner 150ms infinite linear;
  -o-animation: spinner 150ms infinite linear;
  animation: spinner 150ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>
<?php include'header.php';?>

<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Instructor Register</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Instructor Register</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="loading" style="display:none;">Loading&#8230;</div>
	<section class="our-log bgc-fa">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-6" style="margin:auto;">
					<div class="login_form inner_page">
						<form method="POST" id="instructor_register" name="instructor_register" style="border: 1px solid #000;padding: 10px;">
							<div class="heading">
								<h3 class="text-center">Register For your account</h3>
								<p class="text-center">Already have an account? <a class="text-thm" href="instructor-login.php">Login!</a></p>
							</div>
							 <div class="row">
							     <div class="col-md-12">
							         <label><strong>Prefix</strong></label>
							         <select class="form-control" name="prefix" id="prefix">
							             <option value="">Select</option>
							             <option value="Mr.">Mr.</option>
							             <option value="Mrs.">Mrs.</option>
							             <option value="Dr.">Dr.</option>
							         </select>
							         <span class="text-danger" id="error_prefix"></span>
							     </div>
							     <div class="col-md-12">
							         <label><strong>First Name</strong></label>
							         <input type="text" name="first_name"  id="first_name" class="form-control" placeholder="First Name">
							         <span class="text-danger" id="error_first_name"></span>
							     </div>
							     <div class="col-md-12">
							         <label><strong>Last Name</strong></label>
							         <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
							         <span class="text-danger" id="error_last_name"></span>
							     </div>
							</div>
							 <div class="row">
							     <div class="col-md-12">
							         <label><strong>Mobile Number</strong></label>
							         <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number">
							         <span class="text-danger" id="error_mobile"></span>
							     </div>
							     <div class="col-md-12">
							         <label><strong>Email</strong></label>
							        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
							         <span class="text-danger" id="error_email"></span>
							     </div>
							     <div class="col-md-12">
							         <label><strong>Password</strong></label>
							        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
							         <span class="text-danger" id="error_password"></span>
							     </div>
							</div>
							 <div class="row">
							     <div class="col-md-12">
							         <label><strong>Education Level</strong></label>
							         <input type="text" name="education_level" id="education_level" class="form-control" placeholder="Education Level">
							         <span class="text-danger" id="error_education_level"></span>
							     </div>
							     <div class="col-md-12">
							         <label><strong>Area of Expertise</strong></label>
							         <input type="text" name="area_of_expertise" id="area_of_expertise" class="form-control" placeholder="Area of Expertise">
							         <span class="text-danger" id="error_area_of_expertise"></span>
							     </div>
							     <div class="col-md-12">
							         <label><strong>Resume</strong></label>
							         <input type="file" name="resume" class="form-control" id="resume" placeholder="Resume" style="padding: 10px;">
							         <span class="text-danger" id="error_resume"></span>
							     </div>
							</div>
							 <div class="row">
							     <div class="col-md-12">
							         <label><strong>Address</strong></label>
							         <input type="text" name="address" class="form-control" id="address" placeholder="Address">
							         <span class="text-danger" id="error_address"></span>
							     </div>
							</div>
							<button type="submit" name="register" id="register" class="btn btn-log btn-block btn-thm2">Register</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include'footer.php';?>
<script type='text/javascript'>
		$(document).ready(function(){
			$('#instructor_register').submit(function(event) {
				event.preventDefault();
				var form = $(this)
				var formData = new FormData($('form[name="instructor_register"]')[0]);
				$.ajax({
					url: "instructor/ajax/register_async.php",
					method:'POST',
					data: formData,
					contentType: false,
					cache: false,
					processData:false,
					dataType: 'json',
					beforeSend: function (){
                        $('#register').attr('disabled', true).text('Processing')
                        $(".loading").show();
                    },
                    complete: function() {
                        $('#register').attr('disabled', false).text('Register')
                       $(".loading").hide();
                    },
					success: function (response) {
    					if (response.status == 'success')
    					{
    					    alert(response.msg);
    						window.location.reload();
    					}
    					else if (response.status == 'error')
    					{
        					$.each(response.data, function(index, val){
        						$(index).html(val);
    					    });
    					}
    					else
    					{
    						alert(response.msg);
    						setTimeout(function(){
    						window.location.reload();
    						},1000);
    					}
    				},
    				error: function()
    				{
    				    alert('Something Went Wrong!');
    				}
    			});
    		});
    	});
	</script>
		<script>
    	$('#resume').change(function(e) {
    		var input = this;
    		var _URL = window.URL || window.webkitURL;
    		img = new Image();
    		var fileType = input.files[0];
    		var ext=fileType['type'];
    		if ($.inArray(ext.toLowerCase(), ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessing']) == -1) {
    			$('#resume').val('')
    			$('#preview').html('')
    			alert(" Please select a valid file. pdf, doc and docx type allowed .");
    		}else{
    			img.src = _URL.createObjectURL(input.files[0]);
    			img.onload = function () {
    				var w = this.width;
    				var h = this.height;
    				if (input.files && input.files[0]) {
    					if ((input.files[0].size) < (Math.pow(Math.pow(2,10),2) * 8)) {
    						var reader = new FileReader();
    						reader.onload = function (e) {
    							$('#preview_pic').html($('<img/>',{
    								src: e.target.result,
    								width: '100%',
    								height: '100%'
    							}))
    							var delete_icon ='<div id="resume__Name" class="text-center">'
    							+'<a href="javascript:;" class="btn btn-sm btn btn_text_white plain_red" id="resume__Delete"><i class="fa fa-trash icon_p_rt5" aria-hidden="true"></i>Remove Image</a>'
    							+'</div>'
    							$('#resumeInstruction').hide()
    							$('#profileImageBox').hide().after(delete_icon)
    						};
    						reader.readAsDataURL(input.files[0]);
    					} else {
    						$('#resume').val('')
    						$('#preview_pic').html('')
    						alert(" The file you are attempting to upload is wrong format or larger than the permitted size.");
    					}
    				} else {
    					alert("Image not uploaded");
    					$('#resume').val('')
    					$('#preview_pic').html('')
    				}
    			};
    		}
    	});
    	// Remove choosen image
    	$('body').on('click', '#resume__Delete', function(){
    		$('#resume').val('')
    		$('#preview_pic').html('')
    		$(this).parents('#resume__Name').remove()
    		$('#resumeInstruction').show()
    		$('#profileImageBox').show()
    	});
    </script>
    <script>
        $("#email").blur(function()
        {
		    var email =	$('#email').val();
			// if email field is null then return
			if(email == "")
			{
				return;
			}
			// send ajax request if email is not empty
			$.ajax({
					url: 'instructor/ajax/email_validate.php',
					type: 'post',
					data: {
						'email':email,
						'email_check':1,
				},
				success:function(response)
				{
					// clear span before error message
					//$("#error_email").remove();
					// adding span after email textbox with error message
					$("#error_email").html(response);
				},
				error:function(e)
				{
					$("#error_email").html("Something went wrong");
				}
			});
		});
    </script>
</body>
</html>