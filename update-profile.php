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
<link rel="stylesheet" href="instructor/app-assets/bootstrap-select-country.min.css" />
<?php include'header.php';?>

<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Teacher's Profile</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Join Our Team</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!-- About Text Content -->
	<section class="about-section">
		<div class="container">
			<div class="row gutters-sm">
			    <?php
			    $instructor_id = $_GET['instructor'];
$fetch1 = mysqli_query($conn,"SELECT * FROM instructors WHERE  instructor_id='".$instructor_id."' AND is_verified='1'");
$num1 = mysqli_num_rows($fetch1);
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

?>
                <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <?php if($profile_pic!=NULL){ ?>
				        <a href="uploads/profile/instructor-pics/<?=$profile_pic?>" target="_blank">
				            <img src="uploads/profile/instructor-pics/<?=$profile_pic?>" class="rounded-circle" width="150">
				        </a>
				    <?php } else { ?>
				        <img src="instructor/app-assets/avatar7.png" class="rounded-circle" width="150">
				    <?php } ?>
                    <div class="mt-3">
                      <h4><?=$prefix.' '.$first_name.' '.$last_name?></h4>
                      <p class="text-secondary mb-1"><?=$email_address?></p>
                      <p class="text-muted font-size-sm"><?=$telephone_number?></p>
                      <!--<button class="btn btn-primary">Follow</button>-->
                      <!--<button class="btn btn-outline-primary">Message</button>-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                    <?php 
                  if($education_levels){?>
                  <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0">Education Levels</h4>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$education_levels?>
                    </div>
                  </div>
                  <hr>
                  <?php }
                  if($area_of_expertise){?>
                  <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0">Area of Expertise</h4>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$area_of_expertise?>
                    </div>
                  </div>
                  <hr>
                  <?php }
                  if($experience){?>
                  <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0">Experience</h4>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$experience?>
                    </div>
                  </div>
                  <hr>
                  <?php }
                  if($languages){?>
                  <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0">Languages</h4>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$languages?>
                    </div>
                  </div>
                  <hr>
                  <?php }
                  if($introduction){?>
                  <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0">Introduction</h4>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$introduction?>
                    </div>
                  </div>
                  <hr>
                  <?php }
                  if($address){?>
                  <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0">Address</h4>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <select class="selectpicker countrypicker" data-flag="true" data-default="<?=$address?>" disabled></select>
                    </div>
                  </div>
                  <?php }?>
                </div>
              </div>
             
            </div>
            
          <?php } ?>
          </div>
           <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                        <h4 class="mb-0" style="border: 1px solid #fff;text-align: center;padding: 5px;background-image: -webkit-linear-gradient( 0deg, rgb(52,82,255) 0%, rgb(255,16,83) 100%);text-transform: uppercase;">
                          <a href="#" style="color: #fff;font-weight: 600;">Reviews</a>
                        </h4>
                    </div>
                    <?php
                                $fetch2 = mysqli_query($conn,"SELECT * FROM reviews_detail where instructor_id='".$instructor_id."'  AND user_id='".$user_id."' AND status = 0 LIMIT 5");  
                                while($show2 = mysqli_fetch_assoc($fetch2)){
                                $c_name=$show2['c_name']; 
                                $heading=$show2['heading'];
                                $c_review=$show2['c_review']; 
                                $rating=$show2['rating'];
                                $review_image=$show2['review_image'];
                            ?>
						<div class="item">
							<div class="testimonial_item home2">
								<div class="details text-justify" style="margin: 0px;padding-bottom: 0px;">
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
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>

	<script src="instructor/app-assets/bootstrap-select-country.min.js"></script>
</body>
</html>