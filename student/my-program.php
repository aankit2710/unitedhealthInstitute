<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>United Health Institute : Student Dashboard</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="CreativeLayers" content="">
<?php include'header.php'?>
<?php include'sidebar.php'?>
<div class="col-lg-12">
									<nav class="breadcrumb_widgets" aria-label="breadcrumb mb30">
										<h4 class="title float-left">Departments</h4>
										<ol class="breadcrumb float-right">
									    	<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
									    	<li class="breadcrumb-item active" aria-current="page">Departments</li>
										</ol>
									</nav>
								</div>
								<div class="col-lg-12">
									<div class="row mt30">
								<?php
    								$fetch1 = mysqli_query($conn,"SELECT DISTINCT enrolled_course  FROM course_orders WHERE student_id=$student_id");
                                    $num1 = mysqli_num_rows($fetch1);
                                    while($show1 = mysqli_fetch_assoc($fetch1))
                                    {
                                        $fetch11 = mysqli_query($conn,"SELECT * FROM services WHERE service_id='".$show1['enrolled_course']."'");
                                        $show11 = mysqli_fetch_assoc($fetch11);
                                        
                                        $category = $show11['service_name'];
                                ?>	    
			    				<div class="col-sm-6 col-lg-4">
                                    <a href="my-courses.php?category=<?=$category?>">
                    					<div class="img_hvr_box" style="background-image: url('../uploads/our_services/<?=$show11["service_image"]?>');margin-bottom: 0;border-radius: 0;">
                    						<div class="overlay">
                    							<div class="details">
                    								<h5><?=$category?></h5>
                    							</div>
                    						</div>
                    					</div>
                    				</a>
                    				<div style="background-image: -webkit-linear-gradient( 0deg, rgb(52,82,255) 0%, rgb(255,16,83) 100%);padding: 10px;">
                    				    <span style="color:#fff;"><?=$category?></span>
                    				</div>
                				</div>
				                <?php } ?>
							</div>
								</div>
<?php include'footer.php'?>
</body>
</html>