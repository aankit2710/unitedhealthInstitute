<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Title -->
<title>United Health Institute : Refund Policy</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="CreativeLayers" content="">
<?php include'header.php';?>

<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Refund Policy</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Refund Policy</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
$fetch = mysqli_query($conn,"SELECT * FROM refund_policy WHERE user_id='".$user_id."'");
$num = mysqli_num_rows($fetch);
while($show = mysqli_fetch_assoc($fetch))
{
$heading=$show['heading'];
$content=$show['content'];
}
?>
	<section class="our-faq">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-12">
					<div class="faq_according">
						<div class="terms_condition_grid">
							<div class="grids">
								<h4 class="fz20 mb10"><?=$heading?></h4>
						    	<?=html_entity_decode($content)?>
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