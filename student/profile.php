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
										<h4 class="title float-left">Profile</h4>
										<ol class="breadcrumb float-right">
									    	<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
									    	<li class="breadcrumb-item active" aria-current="page">Profile</li>
										</ol>
									</nav>
								</div>
								<div class="container">
    <div class="main-body">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <?php if($profile_pic!=NULL){ ?>
				        <a href="../uploads/profile/student-pics/<?=$profile_pic?>" target="_blank">
				            <img src="../uploads/profile/student-pics/<?=$profile_pic?>" class="rounded-circle" width="150">
				        </a>
				    <?php } else { ?>
				        <img src="app-assets/avatar7.png" class="rounded-circle" width="150">
				    <?php } ?>
                    <div class="mt-3">
                      <h4><?=$first_name.' '.$last_name?></h4>
                      <p class="text-secondary mb-1"><?=$email_address?></p>
                      <p class="text-muted font-size-sm"><?=$telephone_number?></p>
                      <!--<button class="btn btn-primary">Follow</button>-->
                      <!--<button class="btn btn-outline-primary">Message</button>-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0">Address</h4>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$address?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0">Payment Status</h4>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=($payment_completed==1)?'<a class="badge badge-success mb-1 update_status" style="color:#fff;">Payment Completed</a>':'<a class="badge badge-danger mb-1 update_status" style="color:#fff;">Payment Pending</a>'?>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                        <h4 class="mb-0" style="border: 1px solid #fff;text-align: center;padding: 5px;background-image: -webkit-linear-gradient( 0deg, rgb(52,82,255) 0%, rgb(255,16,83) 100%);text-transform: uppercase;">
                          <a href="update-profile.php" style="color: #fff;font-weight: 600;">Update Profile</a>
                        </h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
<?php include'footer.php'?>
</body>
</html>