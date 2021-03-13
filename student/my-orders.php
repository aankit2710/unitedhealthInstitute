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
								<h4 class="title float-left">My Order</h4>
								<ol class="breadcrumb float-right">
							    	<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							    	<li class="breadcrumb-item active" aria-current="page">My Order</li>
								</ol>
							</nav>
						</div>
						
						<div class="col-lg-12">
							<div class="my_course_content_container">
								<div class="my_setting_content">
									<div class="my_setting_content_details pb0">
										<div class="cart_page_form style2">
											<form action="#">
												<table class="table table-responsive">
												  	<thead>
													    <tr class="carttable_row">
													    	<th class="cartm_title">Item</th>
													    	<th class="cartm_title">Date</th>
													    	<th class="cartm_title">Status</th>
													    	<th class="cartm_title">Total</th>
													    </tr>
												  	</thead>
												  	<tbody class="table_body">
												  	    <?php
                            								$fetch1 = mysqli_query($conn,"SELECT * FROM payments WHERE student_id=$student_id");
                                                            $num1 = mysqli_num_rows($fetch1);
                                                            while($show1 = mysqli_fetch_assoc($fetch1))
                                                            {
                                                                $fetch11 = mysqli_query($conn,"SELECT * FROM services WHERE service_id='".$show1['itemid']."'");
                                                                $show11 = mysqli_fetch_assoc($fetch11);
                                                                
                                                                $fetch111 = mysqli_query($conn,"SELECT time_period FROM pricing WHERE service_id='".$show1['itemid']."'");
                                                                $show111 = mysqli_fetch_assoc($fetch111);
                                                                
                                                                $months = $show111['time_period'] / 30;
                                                        ?>
													    <tr>
													    	<th scope="row">
													    		<ul class="cart_list">
													    			<li class="list-inline-item pr20">
													    			    <a href="javascript:;"><img src="../uploads/our_services/<?=$show11["service_image"]?>" alt="<?=$show11['service_name']?>" style="width:120px;"></a>
													    			</li><br/>
													    			<li class="list-inline-item"><a class="cart_title" href="javascript:;"><?=$show11['service_name']?></a></li>
													    		</ul>
													    	</th>
													    	<td><?=$show1['createdtime']?></td>
													    	<td><?=$show1['payment_status']?></td>
													    	<td class="cart_total">$<?=$show1['payment_amount']?></td>
													    	<!--<td class="text-thm tdu">Receipt</td>-->
													    </tr>
													    <?php } ?>
												  	</tbody>
												</table>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					
<?php include'footer.php'?>
</body>
</html>