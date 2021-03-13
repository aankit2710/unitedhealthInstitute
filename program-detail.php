<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Title -->
<title>United Health Institute : Programs</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="CreativeLayers" content="">
<?php include'header.php';?>

<section class="inner_page_breadcrumb">
	<div class="container">
	    <div class="row">
		    <div class="col-xl-6 offset-xl-3 text-center">
			    <div class="breadcrumb_content">
				    <h4 class="breadcrumb_title">Programs</h4>
					<ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Programs</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
$id = $_GET['id'];
$fetch23 = mysqli_query($conn,"SELECT * FROM services WHERE user_id='".$user_id."' AND service_id = '".$id."'");
$num23 = mysqli_num_rows($fetch23);
while($show23 = mysqli_fetch_assoc($fetch23))
{
$service_id=$show23['service_id'];
$service_name=$show23['service_name'];
$service_image=$show23['service_image'];
$content=$show23['content'];
}
?>

<section class="our-team pb40">
	<div class="container">
	    <div class="row">
			<div class="col-md-12 col-lg-12 col-xl-12">
				<div class="row">
					<div class="col-lg-12">
						<div class="courses_single_container">
							<div class="cs_row_one">
								<div class="cs_ins_container">
									<div class="courses_big_thumb">
										<div class="thumb">
											<img src="uploads/our_services/<?=$service_image?>" alt="" >
										</div>
									</div>
								</div>
							</div>
							<div class="cs_row_two">
								<div class="cs_overview b0p0">
						    		<h3 class="title"><?=$service_name?></h3>
									<h4 class="subtitle">Program Description</h4>
									<?=html_entity_decode($content)?>
								</div>
							</div>
						</div>
					</div>
				</div>
		    </div>
		</div>
	</div>
</section>

<?php include'footer.php';?>
</body>
</html>