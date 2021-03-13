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
<link rel="stylesheet" href="app-assets/bootstrap-select-country.min.css" />
  <?php include'header.php'?>
  <?php include'sidebar.php'?>
  <div class="col-lg-12">
   <nav class="breadcrumb_widgets" aria-label="breadcrumb mb30">
    <h4 class="title float-left">Update Profile</h4>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
    </ol>
  </nav>
</div>
<div class="container">
  <div class="main-body">
    <div class="row gutters-sm">
      <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 text-secondary">
                <form class="form" method="POST" name="update_profile" id="update_profile">
                  <div class="row">
                    <div class="col">
                      <div class="row">
                        <div class="col-12 col-sm-auto mb-3">
                          <div class="mx-auto" style="width: 140px;">
                            <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);"> 
                                <?php if($profile_pic!=NULL){ ?>
            				        <a href="../uploads/profile/instructor-pics/<?=$profile_pic?>" target="_blank">
            				            <img src="../uploads/profile/instructor-pics/<?=$profile_pic?>" class="img-responsive" width="150">
            				        </a>
            				    <?php } else { ?>
            				        <img src="app-assets/avatar7.png" class="img-responsive" width="150">
            				    <?php } ?>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label>Change Photo</label>
                            <input class="form-control" type="file" name="profile_pic" placeholder="Profile Pic" style="padding:5px;">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First Name" value="<?=$first_name?>">
                            <span class="text-danger" id="erfirst_name"></span>
                          </div>
                          <div class="form-group">
                            <label>Experience </label>
                            <input class="form-control" type="text" name="experience" id="experience" placeholder="Experience" value="<?=$experience?>">
                            <span class="text-danger" id="erexperience"></span>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group"> 
                            <label>Last Name</label> 
                            <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last Name" value="<?=$last_name?>">
                            <span class="text-danger" id="erlast_name"></span>
                          </div>
                          <div class="form-group"> 
                            <label>Languages</label> 
                            <input class="form-control" type="text" name="languages" id="languages" placeholder="Languages" value="<?=$languages?>">
                            <span class="text-danger" id="erlanguages"></span>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group"> 
                            <label>Contact Number</label> 
                            <input class="form-control" type="text" name="telephone_number" id="telephone_number" placeholder="Telephone Number" value="<?=$telephone_number?>">
                            <span class="text-danger" id="ertelephone_number"></span>
                          </div>
                          <div class="form-group">
                            <label>Education</label>
                            <input class="form-control" type="text" name="education_levels" id="education_levels" placeholder="Education" value="<?=$education_levels?>">
                            <span class="text-danger" id="ereducation_levels"></span>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group"> 
                            <label>E-mail Address</label> 
                            <input class="form-control" type="text" name="email_address" id="email_address" placeholder="Email Address" value="<?=$email_address?>">
                            <span class="text-danger" id="eremail_address"></span>
                          </div>
                          <div class="form-group"> 
                            <label>Skills</label> 
                            <input class="form-control" type="text" name="skills" id="skills" placeholder="Skills" value="<?=$area_of_expertise?>">
                            <span class="text-danger" id="erskills"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col">
                          <div class="form-group"> 
                            <label>Introduction</label> 
                            <input class="form-control" type="text" name="introduction" id="introduction" placeholder="Introduction" value="<?=$introduction?>">
                            <span class="text-danger" id="erintroduction"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group"> 
                           <label>Country</label> 
                           <select class="selectpicker countrypicker" name="address" data-flag="true" data-live-search="true" data-default="<?=$address?>"></select>
                           
                            <!--<input class="form-control" type="text" name="address" id="address" placeholder="Address" value="<?=$address?>">-->
                            <span class="text-danger" id="eraddress"></span>
                          </div>
                        </div>
                       </div>
                       <!--<div class="col-lg-4">
				<div class="example">
					<h4>Multible with Flag</h4>
					<p>Multi-select with flags</p>
					<select class="selectpicker countrypicker" data-flag="true" multiple></select>
					<pre class="html"><code>&lt;select class=&quot;selectpicker countrypicker&quot; data-flag=&quot;true&quot; multiple&gt;&lt;/select&gt;</code></pre>
				</div>
			</div>-->
                     </div>
                   </div>
                  </div>
                  <div class="row">
                    <div class="col d-flex justify-content-end">
                        <input class="form-control" type="hidden" name="instructor_id" id="instructor_id" placeholder="Address" value="<?=$instructor_id?>">
                      <button class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php include'footer.php'?>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>

	<script src="app-assets/bootstrap-select-country.min.js"></script>
<script type='text/javascript'>
	$(document).ready(function(){
		$('#update_profile').submit(function(event) {
			event.preventDefault();
			var form = $(this)
			var formData = new FormData($('form[name="update_profile"]')[0]);
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
							url: "ajax/update-profile-async.php",
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
									window.location="profile.php";
								}
								else if (jSon.status == 'error') {
									ALSP.f.fade_msg(jSon.msg,'error');
									$.each(jSon.data, function(index, val) {
										$(index).html(val);
									})
								} else {
									swal(jSon.msg);
									setTimeout(function(){
									window.location.reload();
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