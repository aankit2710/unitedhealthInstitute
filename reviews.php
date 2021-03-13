<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Title -->
<title>United Health Institute : Reviews</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="CreativeLayers" content="">
<?php include'header.php';?>

<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Reviews</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Reviews</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

<section class="blog_post_container">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="main_blog_post_content">
					    <?php
                        $fetch2 = mysqli_query($conn,"SELECT * FROM reviews_detail where user_id='".$user_id."' AND status = 0");  
                        while($show2 = mysqli_fetch_assoc($fetch2)){
                        $c_name=$show2['c_name']; 
                        $heading=$show2['heading'];
                        $c_review=$show2['c_review']; 
                        $rating=$show2['rating'];
                        ?>
						<div class="row event_lists p0">
							<div class="col-xl-12 pl15-xl pl0">
								<div class="blog_grid_post style2 event_lists mb35" style="border: 1px solid #192675;">
									<div class="details">
										<?=html_entity_decode($c_review)?>
										<h4 class="pt20">By : -<?=$c_name?></h4>
										<h5 class="pt10"><?=$heading?></h5>
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