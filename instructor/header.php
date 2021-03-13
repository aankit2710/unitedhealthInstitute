<?php
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/unitedhealthinstitute/";
include'ajax/auth_session.php';
?>
<!-- css file -->
<link rel="stylesheet" href="<?=$base_url?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/sweet-alert2/sweetalert2.min.css">
<link rel="stylesheet" href="<?=$base_url?>assets/css/style.css">
<link rel="stylesheet" href="<?=$base_url?>assets/css/dashbord_navitaion.css">
<link rel="stylesheet" href="<?=$base_url?>assets/css/user_panel.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="<?=$base_url?>assets/css/responsive.css">
<!-- Favicon -->
<link href="<?=$base_url?>assets/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="<?=$base_url?>assets/images/favicon.ico" sizes="128x128" rel="shortcut icon" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>

	<!-- Main Header Nav -->
	<header class="header-nav menu_style_home_one dashbord_pages navbar-scrolltofixed stricky main-menu">
		<div class="container-fluid">
		    <!-- Ace Responsive Menu -->
		    <nav>
		        <!-- Menu Toggle btn-->
		        <div class="menu-toggle">
		            <img class="nav_logo_img img-fluid" src="<?=$base_url?>assets/images/header-logo.png" alt="header-logo.png">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <a href="<?=$base_url?>" class="navbar_brand float-left dn-smd">
		            <img class="logo1 img-fluid" src="<?=$base_url?>assets/images/header-logo.png" alt="header-logo.png">
		            <img class="logo2 img-fluid" src="<?=$base_url?>assets/images/header-logo.png" alt="header-logo.png">
		            <span>United Health Institute</span>
		        </a>
		        <!-- Responsive Menu Structure-->
		        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
		        <ul class="header_user_notif pull-right dn-smd">
	                <li class="user_setting">
						<div class="dropdown">
	                		<a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
	                		    <?php if($profile_pic!=NULL){ ?>
            				        <img src="../uploads/profile/instructor-pics/<?=$profile_pic?>" class="rounded-circle" width="150">
            				    <?php } else { ?>
            				        <img src="app-assets/avatar7.png" class="rounded-circle" width="150">
            				    <?php } ?>
	                		</a>
						    <div class="dropdown-menu">
						    	<div class="user_set_header">
							    	<p><?=$prefix.' '.$first_name.' '.$last_name?> <br><span class="address"><a href="mailto:<?=$email_address?>"><?=$email_address?></a></span></p>
						    	</div>
						    	<div class="user_setting_content">
									<a class="dropdown-item active" href="profile.php">My Profile</a>
									<a class="dropdown-item" href="ajax/auth_logout.php">Log out</a>
						    	</div>
						    </div>
						</div>
			        </li>
	            </ul>
		    </nav>
		</div>
	</header>
	
	<!-- Main Header Nav For Mobile -->
	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
	        <ul class="header_user_notif dashbord_pages_mobile_version pull-right">
                <li class="user_setting">
					<div class="dropdown">
                		<a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                		
	                		    <?php if($profile_pic!=NULL){ ?>
            				        <a href="../uploads/profile/instructor-pics/<?=$profile_pic?>" target="_blank">
            				            <img src="../uploads/profile/instructor-pics/<?=$profile_pic?>" class="rounded-circle" width="150">
            				        </a>
            				    <?php } else { ?>
            				        <img src="app-assets/avatar7.png" class="rounded-circle" width="150">
            				    <?php } ?>
                		</a>
					    <div class="dropdown-menu">
					    	<div class="user_set_header">
						    	<p><?=$prefix.' '.$first_name.' '.$last_name?> <br><span class="address"><a href="mailto:<?=$email_address?>"><?=$email_address?></a></span></p>
					    	</div>
					    	<div class="user_setting_content">
								<a class="dropdown-item active" href="ptofile.php">My Profile</a>
								<a class="dropdown-item" href="ajax/auth_logout.php">Log out</a>
					    	</div>
					    </div>
					</div>
		        </li>
            </ul>
			<div class="header stylehome1 dashbord_mobile_logo dashbord_pages">
				<div class="main_logo_home2">
		            <img class="nav_logo_img img-fluid float-left mt20" src="<?=$base_url?>assets/images/header-logo.png" alt="header-logo.png">
		            <span>United Health Institute</span>
				</div>
			</div>
		</div><!-- /.mobile-menu -->
	</div>