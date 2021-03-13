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
										<h4 class="title float-left">Settings</h4>
										<ol class="breadcrumb float-right">
									    	<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
									    	<li class="breadcrumb-item active" aria-current="page">Settings</li>
										</ol>
									</nav>
								</div>
								<div class="col-lg-12">
									<div class="my_course_content_container">
										<div class="my_setting_content mb30">
											<div class="my_setting_content_header style2">
												<div class="my_sch_title">
													<h4 class="m0">Change Password</h4>
												</div>
											</div>
											<form method="post" id="change_password" name="change_password">
											<div class="row my_setting_content_details">
												<div class="col-md-12">
													<div class="my_profile_select_box tt_video form-group">
												    	<label for="exampleFormControlInput5">Old Password</label><br>
												    	<input class="form-control" type="password" placeholder="Old Password" name="old_pass" >
												    	<span class="text-danger" id="erold_pass"></span>
													</div>
												</div>
												<div class="col-md-12">
													<div class="my_profile_select_box tt_video form-group">
												    	<label for="exampleFormControlInput5">New Password</label><br>
												    	<input class="form-control" type="password" placeholder="New Password" name="new_pass" >
												    	<span class="text-danger" id="ernew_pass"></span>
													</div>
												</div>
												<div class="col-md-12">
													<div class="my_profile_select_box tt_video form-group">
												    	<label for="exampleFormControlInput5">Confirm Password</label><br>
												    	<input class="form-control" type="password" placeholder="Confirm Password" name="confirm_pass" >
												    	<span class="text-danger" id="erconfirm_pass"></span>
													</div>
												</div>
											    <div class="col-md-12">
													<button type="submit" class="my_setting_savechange_btn btn btn-thm">Change <span class="flaticon-right-arrow-1 ml15"></span></button>
											    </div>
											</div>
											</form>
										</div>
									</div>
								</div>
<?php include'footer.php'?>
<script type='text/javascript'>
		$(document).ready(function(){
			$('#change_password').submit(function(event) {
				event.preventDefault();
				var form = $(this)
				var formData = new FormData($('form[name="change_password"]')[0]);
				swal({
					type: 'warning',
					title: 'Are You Sure',
					showCancelButton: true,
					width: 400,
					confirmButtonText: 'Yes',
					showLoaderOnConfirm: true,
					preConfirm: function() {
						return new Promise(function(resolve) {
							$.ajax({
								url: "ajax/change-password-async.php",
								method:'POST',
								data: formData,
								contentType: false,
								cache: false,
								processData:false,
								dataType: 'json',
								success: function (jSon) {
									if (jSon.status == 'success') {
										swal({
											type: 'success',
											text: jSon.msg,
											showConfirmButton: false,
											timer:1500,
											showConfirmButton: false
										});
										window.location.reload();
									}
									else if (jSon.status == 'error') {
										ALSP.f.fade_msg(jSon.msg,'error');
										$.each(jSon.data, function(index, val) {
											$(index).html(val);
										})
									} else {
										swal(jSon.msg);
										setTimeout(function(){
										// window.location.reload();
										},1000);
									}
								},
								error: function()
								{
									swal('Something Went Wrong!');
								}
							});
						})
					},
					allowOutsideClick: function () {
						!swal.isLoading()
					}
				}).catch(swal.noop);
			});
		});
	</script>
</body>
</html>