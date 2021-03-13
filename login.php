<?php
session_start();
if(isset($_SESSION['student_id'])!="")
{
    header("Location: student/student-dashboard.php");
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Title -->
<title>United Health Institute : Student Login</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="CreativeLayers" content="">
<?php include'header.php';?>

<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Student Login</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Student Login</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="our-log bgc-fa">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-6 offset-lg-3">
					<div class="login_form inner_page">
						<form  method="POST" id="login-form">
							<div class="heading">
								<h3 class="text-center">Login to your account</h3>
								<p class="text-center">Don't have an account? <a class="text-thm" href="register.php">Sign Up!</a></p>
							</div>
							 <div class="form-group">
						    	<input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email Address">
						    	<p class="email_error" style="color: red;"></p>
							</div>
							<div class="form-group">
						    	<input type="password" class="form-control" name="password" id="password" placeholder="Password">
						    	<p class="pass_error" style="color: red;"></p>
							</div>
							<button type="submit" class="btn btn-log btn-block btn-thm2" name="btn-login" id="btn-login">Login</button>
						</form>
						<p id="error" style="color:red;"></p>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include'footer.php';?>
<script type="text/javascript" src="student/app-assets/validation.min.js"></script>
<script type="text/javascript" src="student/app-assets/script.js"></script>
</body>
</html>