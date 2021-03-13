<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Title -->
<title>United Health Institute : Join Our Team</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="CreativeLayers" content="">
<?php include'header.php';?>

<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Teacher's Profile</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Our Teachers</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="home4_about">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-12">
					<div class="row">
					    <?php
                            $fetch1 = mysqli_query($conn,"SELECT * FROM instructors WHERE is_verified='1'");
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
                            $intro= $show1['introduction'];
                            
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
									<p><?=$intro?></p>
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
									<p><?=$intro?></p>
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
									<p><?=$intro?></p>
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
									<p><?=$intro?></p>
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
	

	<!-- Divider -->
	<section class="divider parallax bg-img2" data-stellar-background-ratio="0.3">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="divider-one">
						<p class="color-white">STARTING ONLINE LEARNING</p>
						<h1 class="color-white text-uppercase">Enhance your skIlls wIth best OnlIne courses</h1>
						<a class="btn btn-transparent divider-btn mt10" href="#">Get Started Now</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="our-testimonials" class="our-testimonial" style="background-color: #f9fafc;">
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
                                $fetch2 = mysqli_query($conn,"SELECT * FROM reviews_detail where user_id='".$user_id."' AND status = 0 LIMIT 5");  
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


<?php include'footer.php';?>
</body>
</html>