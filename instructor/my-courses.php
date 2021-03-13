<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>United Health Institute : Instructor Dashboard</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="CreativeLayers" content="">
<?php include'header.php'?>
<?php include'sidebar.php'?>
<div class="col-lg-12">
									<nav class="breadcrumb_widgets" aria-label="breadcrumb mb30">
										<h4 class="title float-left">My Programs</h4>
										<ol class="breadcrumb float-right">
									    	<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
									    	<li class="breadcrumb-item active" aria-current="page">My Programs</li>
										</ol>
									</nav>
								</div>
								<div class="col-lg-12">
									<div class="row mt30">
								<?php
								
    								$category_name = $_GET['category'];
    								$fetch1 = mysqli_query($conn,"SELECT DISTINCT program_id FROM added_courses WHERE services='$category_name' and instructor_id='$instructor_id'");
    								$num1 = mysqli_num_rows($fetch1);
                                    while($show1 = mysqli_fetch_assoc($fetch1))
                                    {
                                        $fetch11 = mysqli_query($conn,"SELECT * FROM services WHERE service_id='".$show1['program_id']."'");
                                        $show11 = mysqli_fetch_assoc($fetch11);
                                         
                                ?>	    
			    				<div class="col-sm-6 col-lg-4">
			    				   
                                    <a href="my-cousre-name.php?program_id=<?=$show1['program_id']?>">
                    					<div class="img_hvr_box" style="background-image: url('../uploads/our_services/<?=$show11["service_image"]?>');">
                    						<div class="overlay">
                    							<div class="details">
                    								<h5><?=$show11['service_name']?></h5>
                    							</div>
                    						</div>
                    					</div>
                    				</a>
                				</div>
				                <?php } ?>
							</div>
								</div>
<?php include'footer.php'?>
</body>
</html>