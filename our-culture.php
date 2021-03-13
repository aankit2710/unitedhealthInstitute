<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Title -->
<title>United Health Institute : Our Culture</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="CreativeLayers" content="">
<?php include'header.php';?>

<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Our Culture</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Our Culture</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
$page_id = 2;
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
				<div class="col-lg-5">
					<div class="about_thumb">
						<img class="img-fluid" src="uploads/pages/<?=$page_image?>" alt="<?=$page_name?>">
					</div>
				</div>
				<div class="col-lg-7 text-justify">
					<div class="about_content">
						<h3><?=$page_name?></h3>
						<?=html_entity_decode($content)?>
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
	<?php
        $fetch2 = mysqli_query($conn,"SELECT * FROM our_team_content where user_id='".$user_id."'");  
        while($show2 = mysqli_fetch_assoc($fetch2)){
        $heading=$show2['heading']; 
        $content=$show2['content'];
        }
    ?>
	<section class="our-team pb40">
		<div class="container">
		    <div class="row">
				<div class="col-lg-12">
					<div class="main-title text-center">
						<h3 class="mb0 mt0"><?=$heading?></h3>
						<?=html_entity_decode($content)?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-lg-8 col-xl-9">
					<div class="row">
					    <?php
                        $fetch2 = mysqli_query($conn,"SELECT * FROM our_team where user_id='".$user_id."'");  
                        while($show2 = mysqli_fetch_assoc($fetch2)){
                        $member_id = $show2['member_id'];
                        $name=$show2['member_name']; 
                        $email=$show2['member_email'];
                        $phone=$show2['member_phone']; 
                        $designation=$show2['member_designation'];
                        $pic=$show2['member_pic'];
                        ?>
						<div class="col-sm-6 col-lg-6 col-xl-4">
							<div class="team_member style3 text-center mb30">
								<div class="instructor_col">
									<div class="thumb">
										<img class="img-fluid img-rounded-circle" src="uploads/team/<?=$pic?>" alt="<?=$name?>">
									</div>
									<div class="details">
										<h4><?=$name?></h4>
										<p><?=$designation?></p>
										<ul>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
										</ul>
									</div>
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