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
<section class="home6_about pt35 bgc-f9">
		<div class="container">
			<div class="row mt30">
			    <?php
                $fetch23 = mysqli_query($conn,"SELECT * FROM services WHERE user_id='".$user_id."' ORDER BY service_id ASC");
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
			</div>
		</div>
	</section>

<?php include'footer.php';?>
</body>
</html>