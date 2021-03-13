<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Title -->
<title>United Health Institute : Student Register</title>
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
						<h4 class="breadcrumb_title">Student Register</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Student Register</li>
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
						<form method="POST" id="student_register" name="student_register" style="border: 1px solid #000;padding: 10px;">
							<div class="heading">
								<h3 class="text-center">Register For your account</h3>
								<p class="text-center">Already have an account? <a class="text-thm" href="login.php">Login!</a></p>
							</div>
							 <div class="row">
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
							         <label><strong>Address</strong></label>
							         <input type="text" name="address" class="form-control" id="address" placeholder="Address">
							         <span class="text-danger" id="error_address"></span>
							     </div>
							</div>
							 <div class="row">
							     <div class="col-md-12">
							        <label><strong>Select Program</strong></label>
							        <select class="form-control" id="course" name="course">
							            <option value="">Select Program</option>
    									<?php
    									    if(isset($_GET['course']))
    									    {
    									        $selected_course = $_GET['course'];
    									    }
    									    else
    									    {
    									        $selected_course = '';
    									    }
    									    $fetch1 = mysqli_query($conn,"SELECT DISTINCT program_name FROM services WHERE user_id=1");
                                            $num1 = mysqli_num_rows($fetch1);
                                            while($show1 = mysqli_fetch_assoc($fetch1))
                                            {
                                        ?>
                                            <option value="<?=$show1['program_name']?>" <?=($selected_course==$show1['program_name'])?'selected':''?>><?=html_entity_Decode($show1['program_name'])?></option>
                                        <?php
                                        }
    									?>
    								</select>
							         <span class="text-danger" id="error_course"></span>
							     </div>
							     <div class="col-md-12">
							        <label><strong>Select Teacher</strong></label>
							        <select class="form-control" id="instructor" name="instructor">
    								</select>
							         <span class="text-danger" id="error_instructor"></span>
							     </div>
							     <div class="col-md-12" id="price_loading" style="display:none;">
							         <label><strong>Price</strong></label>
							         <div id="price_detail">
							             
							         </div>
							     </div>
							</div>
							<button type="submit" name="register" id="register" class="btn btn-log btn-block btn-thm2">Register</button>
						</form>
						<form id="jsform" action="pricing/payments.php" method="post" target="_top">
						    <input type="hidden" name="cmd" value="_xclick">
						    <input type="hidden" name="item_name" id="item_name" value="">
						    <input type="hidden" name="checkprice" id="checkprice" value="">
                            <input type="hidden" name="item_number" id="item_number" value="">
						    <input type="hidden" name="currency_code" value="USD">
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include'footer.php';?>
<script type='text/javascript'>
		$(document).ready(function(){
			$('#student_register').submit(function(event) {
				event.preventDefault();
				var form = $(this)
				var formData = new FormData($('form[name="student_register"]')[0]);
				$.ajax({
					url: "student/ajax/register_async.php",
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
    					    $("#student").val(response.data);
    					    $(".loading").show();
    					    $('#jsform').submit();
    						//window.location.reload();
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
	<script type="text/javascript">
	    <?php
	    if(isset($_GET['course']) && isset($_GET['mycourse']))
    	{
    	    $selected_course = $_GET['course'];
    	    $price_id = $_GET['mycourse'];
    	?>
    	$(document).ready(function(){
        	load_price();
        	function load_price()
        	{
        	    var item_number = $("#course option:selected").val();
                var item_name = $("#course option:selected").text();
                var price_id = <?=$price_id?>;
        		$.ajax({
        			url:"get_price.php",
        			method:"POST",
        			data:{price:<?=$selected_course?>},
        			success:function(data)
        			{
        			    var obj = JSON.parse(data);
        			    $("#price_loading").show();
        				$("#price_detail").fadeIn(500).html(obj.price);
        				$("#item_name").val(item_name);
        				$("#item_number").val(item_number);
        				$("#checkprice").val(price_id);
        			}
        		});
        	}
    	});
    	<?php
    	}
	    ?>
    	
        $(function() { 
            //$('#price').hide(); 
            $('#course').change(function(){
                var price = $(this).val();
                var item_name = $("#course option:selected").text();
                //$("#price").text("Product under Price Rs." + price);  
                $.ajax({  
                    url:"get_price.php",  
                    method:"POST",  
                    data:{price:price},  
                    success:function(data){  
                        var obj = JSON.parse(data);
                        $("#price_loading").show();
        				$("#price_detail").fadeIn(500).html(obj.price);
                        $("#item_name").val(item_name);
                        $("#item_number").val(price);
                        $("#checkprice").val(obj.pricing_id);
                    }  
                });  
                // if($('#course').val()) {
                //     $('#price').show();
                // }
                // else
                // {
                //     $('#price').hide();
                // } 
            });
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
					url: 'student/ajax/email_validate.php',
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
    <script>
        $( "select[name='course']" ).change(function(){
            var course = $(this).val();
            if(course)
            {
                $.ajax({
                    url: "get_instructor.php",
                    dataType: 'Json',
                    data: {'courseId':course},
                    success: function(data) {
                        $('select[name="instructor"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="instructor"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
            else
            {
                $('select[name="instructor"]').empty();
            }
        });
    </script>
</body>
</html>