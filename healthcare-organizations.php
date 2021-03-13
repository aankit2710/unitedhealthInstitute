<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Title -->
<title>United Health Institute : Healthcare Orgnaizations</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="CreativeLayers" content="">
<?php include'header.php';?>

<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Healthcare Orgnaizations</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Healthcare Orgnaizations</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
$page_id = 14;
$featch_query = mysqli_query($conn,"SELECT * FROM pages WHERE user_id='".$user_id."' AND page_id='".$page_id."' ");
while($rowtkk = mysqli_fetch_assoc($featch_query)){
$page_name = $rowtkk['page_name'];
$content = $rowtkk['content'];
$page_image = $rowtkk['page_image'];
}
?>
	<!-- About Text Content -->
	<section class="about-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 text-justify">
					<div class="about_content">
						<h3><?=$page_name?></h3>
						<?=html_entity_decode($content)?>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="about_thumb">
						<img class="img-fluid" src="uploads/pages/<?=$page_image?>" alt="<?=$page_name?>">
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
</body>
</html>