
	<section id="our-newslatters" class="our-newslatters">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center color-black">
						<h3 class="mt0">Get Newsletter</h3>
						<p>Your download should start automatically, if not Click here. Should I give up, huh?.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 offset-lg-3">					
					<div class="footer_apps_widget_home1">
						<form class="form-inline" id="subscribe" name="subscribe" method="POST">
							<input type="email" class="form-control" name="sub_email" id="sub_email" placeholder="Email address">
							<button type="submit" class="btn btn-lg btn-thm dbxshad">Get it now <span class="flaticon-right-arrow-1"></span></button>
						</form>
						<p class="text-danger" id="error_sub_email"></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Our Footer -->
	<section class="footer_one">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-3 col-lg-3">
					<div class="footer_contact_widget">
						<h4>CONTACT</h4>
						<p><?=$address?></p>
						<p><a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><?=$phone_number?></a></p>
						<p><a href="mailto:<?=$email_address?>"><?=$email_address?></a></p>
					</div>
				</div>
				<div class="col-sm-6 col-md-5 col-md-4 col-lg-3">
					<div class="footer_company_widget">
						<h4>COMPANY</h4>
						<ul class="list-unstyled">
							<li><a href="about-us.php">About Us</a></li>
							<li><a href="blogs.php">Blog</a></li>
							<li><a href="contact-us.php">Contact Us</a></li>
							<li><a href="why-uhi.php">Why UHI?</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-5 col-md-4 col-lg-3">
					<div class="footer_program_widget">
						<h4>PROGRAMS</h4>
						<ul class="list-unstyled">
						    <?php
                            $fetch23 = mysqli_query($conn,"SELECT * FROM services WHERE user_id='".$user_id."' ORDER BY service_id ASC limit 4");
                            $num23 = mysqli_num_rows($fetch23);
                            while($show23 = mysqli_fetch_assoc($fetch23))
                            {
                            $service_id=$show23['service_id'];
                            $service_name=$show23['service_name'];
                            ?>
							<li><a href="program-detail.php?id=<?=$service_id?>"><?=strtoupper($service_name)?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-5 col-md-4 col-lg-3">
					<div class="footer_support_widget">
						<h4>Additional Resources</h4>
						<ul class="list-unstyled">
							<li><a href="referral-center.php">REFERRAL CENTER</a></li>
							<li><a href="advantedge-program.php">ADVANTEDGE PROGRAM</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Footer Middle Area -->
	<section class="footer_middle_area p0">
		<div class="container">
			<div class="row">
				<div class="col-sm-7 col-md-6 col-lg-5 col-xl-4 pb15 pt15">
					<div class="logo-widget home6">
						<img class="img-fluid" src="assets/images/header-logo.png" alt="header-logo.png">
						<span>UNITED HEALTH INSTITUTE</span>
					</div>
				</div>
				<div class="col-sm-5 col-md-7 col-lg-5 col-xl-5 pb25 pt25 brdr_left_right home6">
					<div class="footer_menu_widget home6">
						<ul>
							<li class="list-inline-item"><a href="faqs.php">Faqs</a></li>
							<li class="list-inline-item"><a href="privacy-policy.php">Privacy Policy</a></li>
							<li class="list-inline-item"><a href="terms.php">Terms</a></li>
							<li class="list-inline-item"><a href="refund-policy.php">Refund Policy</a></li>
							<li class="list-inline-item"><a href="#">Sitemap</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-12 col-lg-2 col-xl-3 pb15 pt15">
					<div class="footer_social_widget home6 mt15">
						<ul>
							<?=($facebook)?'<li class="list-inline-item"><a href="'.$facebook.'" target="_blank"><i class="fa fa-facebook"></i></a></li>':''?>
                            <?=($twitter)?'<li class="list-inline-item"><a href="'.$twitter.'" target="_blank"><i class="fa fa-twitter"></i></a></li>':''?>
                            <?=($instagram)?'<li class="list-inline-item"><a href="'.$instagram.'" target="_blank"><i class="fa fa-instagram"></i></a></li>':''?>
                            <?=($linkedin)?'<li class="list-inline-item"><a href="'.$linkedin.'" target="_blank"><i class="fa fa-linkedin"></i></a></li>':''?>
                            <?=($pinterest)?'<li class="list-inline-item"><a href="'.$pinterest.'" target="_blank"><i class="fa fa-pinterest"></i></a></li>':''?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Footer Bottom Area -->
	<section class="footer_bottom_area pt25 pb25">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="copyright-widget text-center">
						<p>Copyright © <?=date('Y')?> United Health Institute. All rights reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
<a class="scrollToHome" href="#"><i class="flaticon-up-arrow-1"></i></a>
</div>
<!-- Wrapper End -->
<script data-cfasync="false" src="https://cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="assets/js/jquery-migrate-3.0.0.min.js"></script>
<script type="text/javascript" src="assets/js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="assets/js/ace-responsive-menu.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/js/snackbar.min.js"></script>
<script type="text/javascript" src="assets/js/simplebar.js"></script>
<script type="text/javascript" src="assets/js/parallax.js"></script>
<script type="text/javascript" src="assets/js/scrollto.js"></script>
<script type="text/javascript" src="assets/js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="assets/js/jquery.counterup.js"></script>
<script type="text/javascript" src="assets/js/wow.min.js"></script>
<script type="text/javascript" src="assets/js/progressbar.js"></script>
<script type="text/javascript" src="assets/js/slider.js"></script>
<script type="text/javascript" src="assets/js/timepicker.js"></script>
<!-- Custom script for all pages --> 
<script type="text/javascript" src="assets/js/script.js"></script>

<script type='text/javascript'>
		$(document).ready(function(){
			$('#subscribe').submit(function(event) {
				event.preventDefault();
				var form = $(this)
				var formData = new FormData($('form[name="subscribe"]')[0]);
				$.ajax({
					url: "subscribe_async.php",
					method:'POST',
					data: formData,
					contentType: false,
					cache: false,
					processData:false,
					dataType: 'json',
					success: function (response) {
    					if (response.status == 'success')
    					{
    					    alert(response.msg);
    						setTimeout(function(){
    						window.location.reload();
    						},1000);
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