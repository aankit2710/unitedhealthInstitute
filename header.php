<?php 
include_once("adminiar/includes/config/db.php");
$user_id = 1;
$fetkk = mysqli_query($conn,"SELECT * FROM contact_details WHERE user_id='".$user_id."'");
while($rowt = @mysqli_fetch_assoc($fetkk)){
$contact_content = $rowt['content'];    
$phone_number = $rowt['phone_number'];
$extra_phone_number = $rowt['extra_phone_number'];
$email_address = $rowt['email_address'];
$extra_email_address = $rowt['extra_email_address'];
$address = $rowt['address'];
$lattitude = $rowt['lattitude'];
$longitude = $rowt['longitude'];
$fax = $rowt['fax'];
}

$fetch2 = mysqli_query($conn,"SELECT * FROM about_details where user_id='".$user_id."'");  
while($show2 = mysqli_fetch_assoc($fetch2)){
$about_heading=$show2['about_heading1']; 
$about_content=$show2['about_content1'];
$about_heading2=$show2['about_heading2']; 
$about_content2=$show2['about_content2'];
$about_heading3=$show2['about_heading3']; 
$about_content3=$show2['about_content3'];
}

$fetk = mysqli_query($conn,"SELECT * FROM social_links WHERE user_id='".$user_id."'");
while($rowtk = @mysqli_fetch_assoc($fetk)){
$facebook = $rowtk['facebook'];
$twitter = $rowtk['twitter'];
$pinterest = $rowtk['pinterest'];
$instagram = $rowtk['instagram'];
$linkedin = $rowtk['linkedin'];
}

$fetch = mysqli_query($conn,"SELECT * FROM home_details WHERE user_id='".$user_id."'");
$num = mysqli_num_rows($fetch);
while($show = mysqli_fetch_assoc($fetch))
{
$home_heading=$show['heading'];
$home_content=$show['content'];
$counties=$show['counties'];
$clients=$show['clients'];
$licences=$show['licences'];
}

$fetch1 = mysqli_query($conn,"SELECT * FROM profile_details WHERE user_id='".$user_id."'");
$num1 = mysqli_num_rows($fetch1);
while($show1 = mysqli_fetch_assoc($fetch1))
{
$profile_name=$show1['profile_name'];
$profile_name=$show1['about_me'];
$profile_name=$show1['company_name'];
$profile_name=$show1['website_name'];
$profile_img=$show1['profile_pic'];
}
?>
<!-- css file -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/new-custom.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="assets/css/responsive.css">
<!-- Favicon -->
<link href="assets/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="assets/images/favicon.ico" sizes="128x128" rel="shortcut icon" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    top: 100px !important;
    position: fixed !important;
<![endif]-->
<style>
    .sub-menu-33.sub-menu {
    margin-left: 75px !important;
}
.sub-menu-34.sub-menu {
    margin-left: 788px !important;
    top: 100px !important;
    position: fixed !important;
}
</style>
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>
	<div class="header_top home6">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-xl-5">
					<ul class="home4_header_top_contact">
						<li class="list-inline-item"><i class="flaticon-email" style="color:#fff;"></i> <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><?=$phone_number?></a></li>
						<li class="list-inline-item"><i class="flaticon-call" style="color:#fff;"></i> <a href="mailto:<?=$email_address?>"><?=$email_address?></a></li>
					</ul>
				</div>
				<div class="col-lg-7 col-xl-7">
			        <ul class="sign_up_btn home6 dn-smd text-right">
			            
		                <li class="list-inline-item">
		                	<a href="instructor-login.php" class="btn btn-md"><i class="flaticon-user"></i> <span>Instructor Login</span></a>
		                </li>
		                <li class="list-inline-item">
		                	<a href="login.php" class="btn btn-md"><i class="flaticon-user"></i> <span>Student Login</span></a>
		                </li>
		                <li class="list-inline-item">
		                	<a href="signup-category.php" class="btn btn-md"><i class="flaticon-user"></i> <span> Sign Up </a>
		                </li>
		            </ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Main Header Nav -->
	<header class="header-nav menu_style_home_six navbar-scrolltofixed main-menu">
		<div class="container">
		    <!-- Ace Responsive Menu -->
		    <nav>
		        <!-- Menu Toggle btn-->
		        <div class="menu-toggle">
		            <img class="nav_logo_img img-fluid" src="assets/images/header-logo2.png" alt="header-logo2.png">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <a href="index.php" class="navbar_brand float-left dn-smd">
		            <img class="logo1 img-fluid" src="assets/images/header-logo2.png" alt="header-logo2.png">
		            <img class="logo2 img-fluid" src="assets/images/header-logo2.png" alt="header-logo2.png">
		            <span>UNITED HEALTH INSTITUTE</span>
		        </a>
		        <!-- Responsive Menu Structure-->
		        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
		        <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">		        	
		            <li class="list_one"><a href="index.php"><span class="title">Home</span></a></li>
		            <li class="list_two">
		                <a href="javascript:;"><span class="title">Programs</span></a>
		                <ul>
		                    <li><a style="text-align:center;background: #182471 !important;color: white;" class="title">Departments</a></li>
		                    <?php
		                    $fetch1 = mysqli_query($conn,"SELECT DISTINCT service_name FROM services");
                                    $num1 = mysqli_num_rows($fetch1);
                                    while($show1 = mysqli_fetch_assoc($fetch1))
                                    {
                                        $service_name = $show1['service_name'];
                                ?>
                                <li class="list_two">
		                <a href="javascript:;" class="testing"><span class="title"><?=$service_name?></span></a>
		                <ul class="sub-menu-33">
		                     <?php
		                     $p ="SELECT DISTINCT program_name FROM services where service_name='$service_name'";
		                    $fetch11 = mysqli_query($conn,$p);
                                    $num11 = mysqli_num_rows($fetch11);
                                    while($show11 = mysqli_fetch_assoc($fetch11))
                                    {
                                        $program_name = $show11['program_name'];
                                ?>
                                <li><a href="#" class="testing"><?=html_entity_decode($program_name)?></a>
                               <!-- <ul class="sub-menu-34">
		                     <?php
		                     $pp ="SELECT category_name FROM services where program_name='$program_name'";
		                    $fetch111 = mysqli_query($conn,$pp);
                                    $num111 = mysqli_num_rows($fetch111);
                                    while($show111 = mysqli_fetch_assoc($fetch111))
                                    {
                                        $category_name = $show111['category_name'];
                                ?>
                                <li><a href="#"><?=$category?></a></li>
		                    <?php } ?>
		                </ul>-->
		                </li>
		                    <?php } ?>
		                </ul>
		            </li>
		            <?php } ?>
		                </ul>
		            </li>
		            <li class="list_three">
		                <a href="javascript:;" ><span class="title">Pricing</span></a>
		                <ul>
		                    <li><a href="pricing.php" class="testing">Pricing</a></li>
		                    <li><a href="financial-assistance.php" class="testing">Financial Assistance</a></li>
		                    <li><a href="advantedge-program.php" class="testing">AdvantEDGE Program</a></li>
		                    <li><a href="extensions.php" class="testing">Extensions</a></li>
		                </ul>
		            </li>
		            <li class="list_four">
		                <a href="javascript:;"><span class="title">Military</span></a>
		                <ul>
		                    <li><a href="military.php" class="testing">Military</a></li>
		                    <li><a href="mcaa.php" class="testing">MyCAA</a></li>
		                    <li><a href="army-ca-funding.php" class="testing">Army CA Funding</a></li>
		                </ul>
		            </li>
		            <li class="list_five">
		                <a href="javascript:;"><span class="title">Why UHI?</span></a>
		                <ul>
		                    <li><a href="why-uhi.php" class="testing">Why UHI</a></li>
		                    <li><a href="partners.php" class="testing">Partners</a></li>
		                    <li><a href="reviews.php" class="testing">Reviews/Testimonials</a></li>
		                    <li><a href="success-stories.php" class="testing">Success Stories</a></li>
		                </ul>
		            </li>
		            <li class="list_six">
		                <a href="javascript:;"><span class="title">Resources</span></a>
		                <ul>
		                    <li><a href="resources.php" class="testing">Resources</a></li>
		                    <li><a href="blogs.php" class="testing">Blog</a></li>
		                </ul>
		            </li>
		            <li class="list_seven">
		                <a href="javascript:;"><span class="title">Business</span></a>
		                <ul>
		                    <li><a href="education.php" class="testing">Education</a></li>
		                    <li><a href="academic-partners.php" class="testing">Academic Partners</a></li>
		                    <li><a href="healthcare-organizations.php" class="testing">Healthcare Organizations</a></li>
		                </ul>
		            </li>
		            <li class="last">
		                <a href="javascript:;"><span class="title">About</span></a>
	                	<ul>
		                    <li><a href="about-us.php" class="testing">Our Story</a></li>
                            <li><a href="contact-us.php" class="testing">Contact Us</a></li>
		                    <li><a href="our-culture.php" class="testing">Culture</a></li>
		                    <li><a href="join-team.php" class="testing">Join Our Team</a></li>
	                	</ul>
		            </li>
		        </ul>
		    </nav>
		    <!-- End of Responsive Menu -->
		</div>
	</header>
	<!-- Main Header Nav For Mobile -->
	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
			<div class="header stylehome1 home6">
				<div class="main_logo_home2">
		            <img class="nav_logo_img img-fluid float-left mt20" src="assets/images/header-logo.png" alt="header-logo.png">
		            <span>UHI</span>
				</div>
				<ul class="menu_bar_home2">					
					<li class="list-inline-item"></li>
					<li class="list-inline-item"><a href="#menu"><span></span></a></li>
				</ul>
			</div>
		</div><!-- /.mobile-menu -->
		<nav id="menu" class="stylehome1">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#">Programs</a></li>
				<li><span>Pricing</span>
					<ul>
						<li><a href="pricing.php">Pricing</a></li>
		                <li><a href="financial-assistance.php">Financial Assistance</a></li>
		                <li><a href="advantedge-program.php">AdvantEDGE Program</a></li>
		                <li><a href="extensions.php">Extensions</a></li>
		            </ul>
				</li>
				<li><span>Military</span>
					<ul>
						<li><a href="military.php">Military</a></li>
		                <li><a href="mcaa.php">MyCAA</a></li>
		                <li><a href="army-ca-funding.php">Army CA Funding</a></li>
					</ul>
				</li>
				<li><span>Why UHI?</span>
					<ul>
	                    <li><a href="why-uhi.php">Why UHI</a></li>
		                <li><a href="partners.php">Partners</a></li>
		                <li><a href="reviews.php">Reviews/Testimonials</a></li>
		                <li><a href="success-stories.php">Success Stories</a></li>
					</ul>
				</li>				
				<li><span>Resources</span>
					<ul>
	                    <li><a href="resources.php">Resources</a></li>
		                <li><a href="blogs.php">Blog</a></li>
					</ul>
				</li>
				<li><span>Business</span>
					<ul>
	                    <li><a href="education.php">Education</a></li>
		                <li><a href="academic-partners.php">Academic Partners</a></li>
		                <li><a href="healthcare-organizations.php">Healthcare Organizations</a></li>
					</ul>
				</li>
				<li><span>About</span>
					<ul>
						<li><a href="about-us.php">Our Story</a></li>
                        <li><a href="contact-us.php">Contact Us</a></li>
		                <li><a href="our-culture.php">Culture</a></li>
		                <li><a href="join-team.php">Join Our Team</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>