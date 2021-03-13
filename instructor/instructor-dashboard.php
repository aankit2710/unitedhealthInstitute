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
								<h4 class="title float-left">Dashboard</h4>
								<ol class="breadcrumb float-right">
							    	<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							    	<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
						</div>
						<?php
						$result=mysqli_query($conn,"SELECT * from payout_message where payout_id = 1");
                        $data=mysqli_fetch_assoc($result);
                        $payout_message_content =  $data['payout_message_content'];
						?>
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="alert alert-success">
                              <strong><?=html_entity_decode($payout_message_content)?></strong>
                            </div>
						</div>
						<?php
						$result=mysqli_query($conn,"SELECT count(*) as total from added_courses where instructor_id = $instructor_id");
                        $data=mysqli_fetch_assoc($result);
                        $total_program =  $data['total'];
						?>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
							<div class="ff_one style2">
								<div class="icon"><span class="flaticon-rating"></span></div>
								<div class="detais">
									<p>Total Programs</p>
									<div class="timer"><?=$total_program?></div>
								</div>
							</div>
						</div>
						<?php
						$result=mysqli_query($conn,"SELECT sum(payment_amount) as total from payments inner join students on payments.student_id = students.student_id where instructor_id = $instructor_id");
                        $data=mysqli_fetch_assoc($result);
                        $total_collection =  $data['total'];
						?>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
							<div class="ff_one style3">
								<div class="icon"><span class="flaticon-online-learning"></span></div>
								<div class="detais">
									<p>Total Collection</p>
									<div class="timer"><?=$total_collection?></div>
								</div>
							</div>
						</div>
						<?php
						$result=mysqli_query($conn,"SELECT count(*) as total from students where instructor_id = $instructor_id");
                        $data=mysqli_fetch_assoc($result);
                        $total_students =  $data['total'];
						?>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
							<div class="ff_one style4">
								<div class="icon"><span class="flaticon-like"></span></div>
								<div class="detais">
									<p>Total Students</p>
									<div class="timer"><?=$total_students?></div>
								</div>
							</div>
						</div>
					
<?php include'footer.php'?>
</body>
</html>