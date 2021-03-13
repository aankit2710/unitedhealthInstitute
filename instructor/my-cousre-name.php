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
										<h4 class="title float-left">My Courses</h4>
										<ol class="breadcrumb float-right">
									    	<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
									    	<li class="breadcrumb-item active" aria-current="page">My Courses</li>
										</ol>
									</nav>
								</div>
								<div class="col-lg-12">
									<div class="row mt30">
								<?php
								
    								$program_id = $_GET['program_id'];
    								$fetch1 = mysqli_query($conn,"SELECT DISTINCT coursedetail, course_id  FROM added_courses WHERE program_id='$program_id' and instructor_id='$instructor_id'");
    								$num1 = mysqli_num_rows($fetch1);
                                    while($show1 = mysqli_fetch_assoc($fetch1))
                                    {
                                        $fetch11 = mysqli_query($conn,"SELECT * FROM services WHERE program_name='".$show1['coursedetail']."'");
                                        $show11 = mysqli_fetch_assoc($fetch11);
                                         
                                ?>	    
			    				<div class="col-sm-6 col-lg-4">
			    				   
                                    <a href="course-detail.php?coures_id=<?=$show1['course_id']?>">
                    					<div class="img_hvr_box" style="background-image: url('../uploads/our_services/cecd4d78eb3eb1765294b34e80596407.jpg');">
                    						<div class="overlay">
                    							<div class="details">
                    								<h5><?=$show1['coursedetail']?></h5>
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