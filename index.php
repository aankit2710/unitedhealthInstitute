<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Title -->
<title>United Health Institute : Home</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="CreativeLayers" content="">
<?php include'header.php';?>

	<div class="home2-slider">
		<div class="container-fluid p0">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-banner-wrapper">
					    <div class="banner-style-one owl-theme owl-carousel">
					        <?php
                            $fetch = mysqli_query($conn,"SELECT * FROM slider_images WHERE user_id='".$user_id."' ORDER BY img_order ASC");
                            $num = mysqli_num_rows($fetch);
                            while($show = mysqli_fetch_assoc($fetch))
                            {
                            $image_name=$show['img_name'];
                            $caption=$show['caption'];
                            $ext_txt=$show['ext_txt'];
                            $ext_txt_line=$show['ext_txt_line'];
                            ?>
					        <div class="slide slide-one sh2" style="background-image: url(uploads/slider_images/<?=$image_name?>);">
					            <div class="container">
					                <div class="row">
					                    <div class="col-lg-7 text-center" style="margin:auto;">
					                        <h3 class="banner-title"><?=$caption?></h3>
					                        <p><?=$ext_txt?></p>
					                        <div class="btn-block">
					                            <a href="#" class="banner-btn"><?=$ext_txt_line?></a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					        <?php } ?>
					    </div>
					    <div class="carousel-btn-block banner-carousel-btn">
					        <span class="carousel-btn left-btn"><i class="flaticon-left-arrow left"></i> <span class="left">PR <br> EV</span></span>
					        <span class="carousel-btn right-btn"><span class="right">NE <br> XT</span> <i class="flaticon-right-arrow-1 right"></i></span>
					    </div><!-- /.carousel-btn-block banner-carousel-btn -->
					</div><!-- /.main-banner-wrapper -->
				</div>
			</div>
		</div>
	</div>

	<!-- about Us home6 -->
	<section class="home6_about pt35 bgc-f9">
		<div class="container">
			<div class="row mt40">
				<div class="col-lg-6">
					<div class="about_box_home6">
						<div class="details text-justify">
							<h3><?=$home_heading?></h3>
							<?=html_entity_decode($home_content)?>
							<a class="btn dbxshad btn-lg btn-thm2 rounded" href="about-us.php">Read More</a>							
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about_box_home6">
						<div class="thumb"><img class="img-fluid img-rounded" src="assets/images/about/1.jpg" alt="1.jpg"></div>
					</div>
				</div>
			</div>
			<div class="row mt30">
				<?php
                $fetch23 = mysqli_query($conn,"SELECT * FROM services WHERE user_id='".$user_id."' ORDER BY service_id ASC limit 8");
                $num23 = mysqli_num_rows($fetch23);
                while($show23 = mysqli_fetch_assoc($fetch23))
                {
                $service_id=$show23['service_id'];
                $service_name=$show23['service_name'];
                $service_image=$show23['service_image'];
                ?>
				<div class="col-sm-6 col-lg-3">
                    <a href="program-detail.php?id=<?=$service_id?>">
    					<div class="img_hvr_box" style="background-image: url('uploads/our_services/<?=$service_image?>');">
    						<div class="overlay">
    							<div class="details">
    								<h5><?=$service_name?></h5>
    							</div>
    						</div>
    					</div>
    				</a>
				</div>
				<?php } ?>
				<div class="col-lg-6 offset-lg-3">
					<div class="courses_all_btn text-center">
						<a class="btn btn-transparent" href="programs.php">View All Programs</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="divider_home1 bg-img2 parallax" data-stellar-background-ratio="0.3">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="divider-one">
						<h1 class="color-white text-uppercase">Get Started Today! Call <?=$phone_number?>.</h1>
						<h3 class="color-white">Find out how United Health Institute can meet your career training needs today.</h3>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Blog -->
	<section id="our-testimonials" class="our-testimonial">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h3 class="mt0">Our Learners Say It Best</h3>
						<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="testimonial_slider_home2">
						<?php
                                $fetch2 = mysqli_query($conn,"SELECT * FROM reviews_detail where user_id='".$user_id."' AND status = 0 LIMIT 6");  
                                while($show2 = mysqli_fetch_assoc($fetch2)){
                                $c_name=$show2['c_name']; 
                                $heading=$show2['heading'];
                                $c_review=$show2['c_review']; 
                                $rating=$show2['rating'];
                                $review_image=$show2['review_image'];
                            ?>
						<div class="item">
							<div class="testimonial_item home2">
								<div class="details text-justify">
									<div class="icon"><span class="fa fa-quote-left"></span></div>
									“<?=html_entity_decode($c_review)?>”
								</div>
								<div class="thumb">
									<div class="title">–<?=$c_name?></div>
									<div class="subtitle"><?=$heading?></div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="divider_home1 bg-img2 parallax" data-stellar-background-ratio="0.3">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="divider-one">
						<h1 class="color-white text-uppercase">Get Started Today! Call <?=$phone_number?>.</h1>
						<h3 class="color-white">Find out how United Health Institute can meet your career training needs today.</h3>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
$page_id = 1;
$featch_query = mysqli_query($conn,"SELECT * FROM pages WHERE user_id='".$user_id."' AND page_id='".$page_id."' ");
while($rowtkk = mysqli_fetch_assoc($featch_query)){
$page_name = $rowtkk['page_name'];
$content = $rowtkk['content'];
$page_image = $rowtkk['page_image'];
}
?>
	<section class="home3_about2 pb40 pt20">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="about2_home3 text-justify">
						<h3><?=$page_name?></h3>
						<?=html_entity_decode($content)?>
						<a href="about-us.php" class="btn about_btn_home3">Read More</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about_thumb_home3 text-right">
						<img class="img-fluid" src="uploads/pages/<?=$page_image?>" alt="<?=$page_name?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="about_home3_shape_container">
						<div class="about_home3_shape3"><img src="assets/images/about/shape3.png" alt="shape3.png"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="divider2 parallax bgc-thm2" data-stellar-background-ratio="0.3">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-xl-6">
				</div>
				<div class="col-lg-6 col-xl-6">
					<div class="divider-two">
						<p class="color-white">REQUEST INFO</p>
						<h3 class="color-white text-uppercase">Take the first step</h3>
					</div>
					<div class="divider-two-form">
						<div id="mc_embed_signup">
							<form id="first_step" name="first_step" method="POST">
							    <div id="mc_embed_signup_scroll">
									<div class="mc-field-group">
										<input type="text" name="name" class="" id="name" placeholder="Your Name">
                                        <p class="text-danger" id="error_name"></p>
									</div>
									<div class="mc-field-group">
										<input type="email" name="email" class="" id="email" placeholder="Email Address">
                                        <p class="text-danger" id="error_email"></p>
									</div>
									<div class="mc-field-group">
										<input type="number" name="phone" class="" id="phone" placeholder="Phone Number">
                                        <p class="text-danger" id="error_phone"></p>
									</div>
									<button type="submit" class="btn btn-lg mailchimp_btn">Get It Now</button>
							    </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
$page_id = 16;
$featch_query = mysqli_query($conn,"SELECT * FROM pages WHERE user_id='".$user_id."' AND page_id='".$page_id."' ");
while($rowtkk = mysqli_fetch_assoc($featch_query)){
$page_name = $rowtkk['page_name'];
$content = $rowtkk['content'];
$page_image = $rowtkk['page_image'];
}
?>
	<section class="home4_about">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-xl-6">
					<div class="about_home3">
						<h3><?=$page_name?></h3>
						<?=html_entity_decode($content)?>
						<a href="teacherprofile.php" class="btn about_btn_home3">View More</a>
					</div>
				</div>
				<div class="col-lg-6 col-xl-6">
					<div class="row">
					    <?php
                            $fetch1 = mysqli_query($conn,"SELECT * FROM instructors WHERE is_verified='1' LIMIT 4");
                            $num1 = mysqli_num_rows($fetch1);
                            $i=1;
                            while($show1 = mysqli_fetch_assoc($fetch1))
                            {
                            $prefix=$show1['prefix'];
                            $first_name=$show1['first_name'];
                            $last_name=$show1['last_name'];
                            $telephone_number=$show1['telephone_number'];
                            $email_address=$show1['email_address'];
                            $address=$show1['address'];
                            $education_levels=$show1['education_levels'];
                            $area_of_expertise=$show1['area_of_expertise'];
                            $resume=$show1['resume'];
                            $profile_pic = $show1['profile_pic'];
                            $is_verified = $show1['is_verified'];
                            $experience = $show1['experience'];
                            $languages = $show1['languages'];
                            $instructor_id = $show1['instructor_id'];
                            $introduction = $show1['introduction'];
                            
                        if($i%4 == 1){
                        ?>
						<div class="col-sm-6 col-lg-6">
							<div class="home3_about_icon_box five">
								<div class="icon"><?php if($profile_pic!=NULL){ ?>
				        <a href="update-profile.php?instructor=<?=$instructor_id?>" target="_blank">
				            <img src="uploads/profile/instructor-pics/<?=$profile_pic?>" class="rounded-circle" width="150">
				        </a>
				    <?php } else { ?>
				    <a href="update-profile.php?instructor=<?=$instructor_id?>" target="_blank">
				        <img src="instructor/app-assets/avatar7.png" class="rounded-circle" width="150">
				        </a>
				    <?php } ?></div>
								<div class="details">
									<h4><?=$prefix.' '.$first_name.' '.$last_name?></h4>
									<p><?=$introduction?></p>
									<a href="update-profile.php?instructor=<?=$instructor_id?>" style="color: #fff;font-weight: 600;">View Profile</a>
								</div>
							</div>
						</div>
						<?php }
						if($i%4 == 2){
						?>
						<div class="col-sm-6 col-lg-6">
							<div class="home3_about_icon_box two">
								<div class="icon"><?php if($profile_pic!=NULL){ ?>
				        <a href="update-profile.php?instructor=<?=$instructor_id?>" target="_blank">
				            <img src="uploads/profile/instructor-pics/<?=$profile_pic?>" class="rounded-circle" width="150">
				        </a>
				    <?php } else { ?>
				    <a href="update-profile.php?instructor=<?=$instructor_id?>" target="_blank">
				        <img src="instructor/app-assets/avatar7.png" class="rounded-circle" width="150">
				        </a>
				    <?php } ?></div>
								<div class="details">
									<h4><?=$prefix.' '.$first_name.' '.$last_name?></h4>
									<p><?=$introduction?></p>
									<a href="update-profile.php?instructor=<?=$instructor_id?>" style="color: #fff;font-weight: 600;">View Profile</a>
								</div>
							</div>
						</div>
						<?php }
						if($i%4 == 3){
						?>
						<div class="col-sm-6 col-lg-6">
							<div class="home3_about_icon_box six">
								<div class="icon"><?php if($profile_pic!=NULL){ ?>
				        <a href="update-profile.php?instructor=<?=$instructor_id?>" target="_blank">
				            <img src="uploads/profile/instructor-pics/<?=$profile_pic?>" class="rounded-circle" width="150">
				        </a>
				    <?php } else { ?>
				    <a href="update-profile.php?instructor=<?=$instructor_id?>" target="_blank">
				        <img src="instructor/app-assets/avatar7.png" class="rounded-circle" width="150">
				        </a>
				    <?php } ?></div>
								<div class="details">
									<h4><?=$prefix.' '.$first_name.' '.$last_name?></h4>
									<p><?=$introduction?></p>
									<a href="update-profile.php?instructor=<?=$instructor_id?>" style="color: #fff;font-weight: 600;">View Profile</a>
								</div>
							</div>
						</div>
						<?php }
						if($i%4 == 0){
						?>
						<div class="col-sm-6 col-lg-6">
							<div class="home3_about_icon_box seven">
								<div class="icon"><?php if($profile_pic!=NULL){ ?>
				        <a href="update-profile.php?instructor=<?=$instructor_id?>" target="_blank">
				            <img src="uploads/profile/instructor-pics/<?=$profile_pic?>" class="rounded-circle" width="150">
				        </a>
				    <?php } else { ?>
				    <a href="update-profile.php?instructor=<?=$instructor_id?>" target="_blank">
				        <img src="instructor/app-assets/avatar7.png" class="rounded-circle" width="150">
				        </a>
				    <?php } ?></div>
								<div class="details">
									<h4><?=$prefix.' '.$first_name.' '.$last_name?></h4>
									<p><?=$introduction?></p>
									<a href="update-profile.php?instructor=<?=$instructor_id?>" style="color: #fff;font-weight: 600;">View Profile</a>
								</div>
							</div>
						</div>
						<?php }
						$i++;
						} ?>
					</div>
				</div>
			</div>
			<!--<div class="row">-->
			<!--	<div class="col-lg-12">-->
			<!--		<div class="about_home3_shape_container">-->
			<!--			<div class="about_home3_shape"><img src="assets/images/about/shape1.png" alt="shape1.png"></div>-->
			<!--		</div>-->
			<!--	</div>-->
			<!--</div>-->
		</div>
	</section>

<?php include'footer.php';?>
<script type='text/javascript'>
		$(document).ready(function(){
			$('#first_step').submit(function(event) {
				event.preventDefault();
				var form = $(this)
				var formData = new FormData($('form[name="first_step"]')[0]);
				$.ajax({
					url: "first_step_async.php",
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
</body>
</html>