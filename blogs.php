<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Title -->
<title>United Health Institute : Blogs</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="CreativeLayers" content="">
<?php include'header.php';?>

<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Blogs</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="blog_post_container">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-12">
					<div class="main_blog_post_content">
						<div class="row">
						    <?php
                $fetch = mysqli_query($conn,"SELECT * FROM blog_posts WHERE userId='".$user_id."'");
                $num = mysqli_num_rows($fetch);
                while($show = mysqli_fetch_assoc($fetch))
                {
                $postId=$show['postId'];
                $postTitle=$show['postTitle'];
                $postDesc=$show['postDesc'];
                $postDate=$show['postDate'];
                $postImage=$show['postImage'];
            ?>
							<div class="col-sm-6 col-lg-6 col-xl-6">
								<div class="blog_grid_post mb30">
									<div class="thumb">
										<img class="img-fluid" src="uploads/blogs/<?=$postImage?>" alt="<?=$postTitle?>">
										<div class="post_date"><h3 style="max-width: unset;background: #00000094;padding: 5px;"><?=date('jS M Y H:i:s', strtotime($postDate))?></h3></div>
									</div>
									<div class="details" style="border: 1px solid #192675;">
										<h3><?=$postTitle?></h3>
										<?=html_entity_decode($postDesc)?>
                                        <a class="read-more" href="viewpost.php?id=<?=$postId?>">Read More</a>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php include'footer.php';?>
</body>
</html>