<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Title -->
<title>United Health Institute : Contact Us</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="CreativeLayers" content="">
<style>
.info
{
color: red;
}
label {
color: #fff;
}
#captcha-error{
border:none !important;
color:red;
}
</style>
<?php include'header.php';?>

<section class="inner_page_breadcrumb">
	<div class="container">
	    <div class="row">
		    <div class="col-xl-6 offset-xl-3 text-center">
			    <div class="breadcrumb_content">
				    <h4 class="breadcrumb_title">Contact Us</h4>
					<ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

    <section class="our-contact">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-4">
					<div class="contact_localtion text-center">
						<div class="icon"><span class="flaticon-placeholder-1"></span></div>
						<h4>Our Location</h4>
						<p><?=$address?></p>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<div class="contact_localtion text-center">
						<div class="icon"><span class="flaticon-phone-call"></span></div>
						<h4>Our Contact</h4>
						<p class="mb0">Mobile : <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><?=$phone_number?></a><br> Fax : <?=$fax?></p>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<div class="contact_localtion text-center">
						<div class="icon"><span class="flaticon-email"></span></div>
						<h4>Write Some Words</h4>
						<p><a href="mailto:<?=$email_address?>"><?=$email_address?></a></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="h600" id="map"></div>
				</div>
				<div class="col-lg-6 form_grid">
					<h4 class="mb5">Send a Message</h4>
					<?=html_entity_decode($contact_content)?>
		            <form class="contact_form" id="contact_form" method="POST">
						<div class="row">
			                <div class="col-sm-6">
			                    <div class="form-group">
			                    	<label for="exampleInputName">Full Name</label>
									<input name="userName" id="userName" class="form-control demoInputBox" type="text">
									<div class="help-block with-errors info" id="userName-info"></div>
								</div>
			                </div>
			                <div class="col-sm-6">
			                    <div class="form-group">
			                    	<label for="exampleInputEmail">Your Email</label>
			                    	<input name="userEmail" id="userEmail" class="form-control demoInputBox" type="email">
			                    	<div class="help-block with-errors info" id="userName-info"></div>
			                    </div>
			                </div>
			                <div class="col-sm-6">
			                    <div class="form-group">
			                    	<label for="exampleInputEmail">Your Phone</label>
			                    	<input name="userPhone" id="userPhone" class="form-control demoInputBox" type="number">
			                    	<div class="help-block with-errors info" id="userPhone-info"></div>
			                    </div>
			                </div>
			                <div class="col-sm-6">
			                    <div class="form-group">
			                    	<label for="exampleInputSubject">Subject</label>
				                    <input id="userSubject" name="userSubject" class="form-control demoInputBox" type="text">
				                    <div class="help-block with-errors info" id="userSubject-info"></div>
								</div>
			                </div>
			                <div class="col-sm-12">
	                            <div class="form-group">
	                            	<label for="exampleInputEmail1">Your Message</label>
	                                <textarea id="content" name="content" class="form-control demoInputBox" rows="5"></textarea>
	                                <div class="help-block with-errors info" id="content-info"></div>
	                            </div>
	                        </div>
	                        <div class="col-lg-6 col-md-6">
                                <div id="captchaimage">
                                    <img src="captcha/images/image.php?<?php echo time(); ?>" width="132" height="46" alt="Captcha image">
                                    <p style="color:#000;">Can't read the image? click <a href="#" id="refreshimg" title="Click to refresh image" style="color:red;">here</a> to refresh</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input type="text" placeholder="Enter Security Code" name='captcha' maxlength="7" id="captcha" class="form-control demoInputBox" style="margin-bottom: 0;">
                                <span id="captcha-info" class="info"></span>
                            </div>
                            <input type="hidden" value="<?=$user_id?>" name="user_id" id="user_id">
                            <div class="col-sm-6">
			                    <div class="form-group ui_kit_button mb0">
				                    <button type="submit" class="btn dbxshad btn-lg btn-thm circle white" onClick="sendContact();">Button</button>
			                    </div>
			                </div>
		                </div>
		            </form>
		            <div id="mail-status" style="margin-top:20px;"></div>
				</div>
			</div>
		</div>
	</section>


<?php include'footer.php';?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHK-eca6Fg4sBk3pDXnvETJ41jWXowQxk"></script>
    <script>
        if ($("#map").length) {
            function initialize() {
              var mapOptions = {
                zoom: 16,
                scrollwheel: false,
                center: new google.maps.LatLng(<?=$lattitude?>, <?=$longitude?>) //please add your location here
              };
              var map = new google.maps.Map(document.getElementById('map'),
                mapOptions);
              var marker = new google.maps.Marker({
                position: map.getCenter(),
                //icon: 'images/locating.png', if u want custom
                map: map
              });
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        }
    </script>
<script>
  function sendContact() {
    var valid;
    valid = validateContact();
    if(valid) {
      jQuery.ajax({
        url: "enquiry_mail.php",
        data:'userName='+$("#userName").val()+'&userEmail='+
        $("#userEmail").val()+'&userPhone='+
        $("#userPhone").val()+'&userSubject='+
        $("#userSubject").val()+'&user_id='+
        $("#user_id").val()+'&content='+
        $("#content").val(),
        type: "POST",
        success:function(data){
            $("#mail-status").html(data);
            setTimeout(function(){
		    window.location.reload();
			},4000);
        },
        error:function (){}
      });
    }
  }
  function validateContact() {
    var valid = true;
    $(".demoInputBox").css('background-color','');
    $(".info").html('');
    if(!$("#userName").val()) {
      $("#userName-info").html("Please Enter Your Name!");
      $("#userName").css({'border':'2px solid red'});
      valid = false;
    }
    if(!$("#userEmail").val()) {
      $("#userEmail-info").html("Please Enter Your Email!");
      $("#userEmail").css({'border':'2px solid red'});
      valid = false;
    }
    if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
      $("#userEmail-info").html("Please Enter Valid Email!");
      $("#userEmail").css({'border':'2px solid red'});
      valid = false;
    }
    if(!$("#userPhone").val()) {
      $("#userPhone-info").html("Please Enter Your Phone Number!");
      $("#userPhone").css({'border':'2px solid red'});
      valid = false;
    }
    if(!$("#userSubject").val()) {
        $("#userSubject-info").html("Please Enter Subject!");
        $("#userSubject").css({'border':'2px solid red'});
        valid = false;
    }
    if(!$("#content").val()) {
      $("#content-info").html("Please Enter Message");
      $("#content").css({'border':'2px solid red'});
      valid = false;
    }
    
    return valid;
  }
</script>
</body>
</html>