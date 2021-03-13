<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Title -->
<title>United Health Institute : Blog Detail</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="CreativeLayers" content="">
<?php include'header.php';?>

<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Blog Detail</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Blog Detail</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php
$postId = $_GET['id'];
$fetch = mysqli_query($conn,"SELECT * FROM blog_posts WHERE userId='".$user_id."' AND postId = '".$postId."'");
$num = mysqli_num_rows($fetch);
while($show = mysqli_fetch_assoc($fetch))
{
$postId=$show['postId'];
$postTitle=$show['postTitle'];
$postCont=$show['postCont'];
$postDesc=$show['postDesc'];
$postDate=$show['postDate'];
$postImage=$show['postImage'];
}
?>	
	<section class="blog_post_container">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-12">
					<div class="main_blog_post_content">
						<div class="mbp_thumb_post">
							<div class="thumb">
								<img class="img-fluid" src="uploads/blogs/<?=$postImage?>" alt="<?=$postTitle?>">
								<div class="tag" style="max-width: unset;background: #00000094;padding: 5px;">Posted By : Admin</div>
								<div class="post_date" style="max-width: unset;background: #00000094;padding: 5px;"><h3><?=date('jS M Y H:i:s', strtotime($postDate))?></h3></div>
							</div>
							<div class="details text-justify">
								<h3><?=$postTitle?></h3>
								<h4>Description</h4>
								<?=html_entity_decode($postDesc)?>
								<h4 class="mb0">Content</h4>
								<?=html_entity_decode($postCont)?>
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