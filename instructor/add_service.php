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
<script src="../ck/build/ckeditor.js"></script>
  <?php include'header.php'?>
  <?php include'sidebar.php'?>
  <div class="col-lg-12">
									<nav class="breadcrumb_widgets" aria-label="breadcrumb mb30">
										<h4 class="title float-left">Add Programs</h4>
										<ol class="breadcrumb float-right">
									    	<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
									    	<li class="breadcrumb-item active" aria-current="page">Add Programs</li>
										</ol>
									</nav>
								</div>
									<div class="col-12">
							<div class="card">
					        <div class="card-header">
					          <h4 class="card-title">Add Programs From Here</h4>
					          <hr/>
					        </div>
					        <div class="card-content">
					          <div class="card-body">
					            <form class="form form-vertical" name="our_services" id="our_services" method="post">
					              <div class="form-body">
					                <div class="row">
					                    <div class="col-12">
											<div class="rounded mr-75 col-12" id="preview_pic" style="width: auto;height: auto;text-align:center">
											</div>
										</div>
										<div class="col-7" style="margin:auto;height:40px">
											<div id="profileImageBox" class="media-body mt-25">
    							                <input type="file" name="profile_pic" class="form-control-file" id="profileImageFile" accept="image/*" data-validation-callbacks=""/>
    											<p class="text-muted ml-1 mt-50 text-center"><small>Allowed JPG, GIF or PNG. Max size of 800kB</small></p>
    							                <span id="erprofile_pic" style="color:red;"></span>
							                </div>
										</div>
										<div class="col-12">
					                    <div class="form-group">
					                        
					                        <select class="form-control" id="name"  name="service_name">
							            <option value="" >Department Name</option>
    									<?php
    									    if(isset($_GET['course']))
    									    {
    									        $selected_course = $_GET['course'];
    									    }
    									    else
    									    {
    									        $selected_course = '';
    									    }
    									    $fetch1 = mysqli_query($conn,"SELECT DISTINCT service_name FROM services WHERE user_id=1");
                                            $num1 = mysqli_num_rows($fetch1);
                                            while($show1 = mysqli_fetch_assoc($fetch1))
                                            {
                                        ?>
                                            <option value="<?=$show1['service_name']?>" <?=($selected_course==$show1['service_name'])?'selected':''?>><?=html_entity_Decode($show1['service_name'])?></option>
                                        <?php
                                        }
    									?>
    								</select>
					                        <span class="text-danger" id="ercategory_name"></span>
					                    </div>
					                  </div>
					                   <div class="col-12">
					                    <div class="form-group">
					                        <label for="name-vertical">Program Name</label>
					                        <input type="text" id="program_name" class="form-control" name="program_name" placeholder="Program Name">
					                        <span class="text-danger" id="erservice_name"></span>
					                    </div>
					                  </div>
					                  <div class="col-12">
					                    <div class="form-group">
					                        <label for="name-vertical">Course Name</label>
					                        <input type="text" id="category_name" class="form-control" name="category_name" placeholder="Course Name">
					                        <span class="text-danger" id="erprogram_name"></span>
					                        
					                    </div>
					                  </div>
					                 
					                  
						                  <div class="col-12">
						                    <div class="form-group">
						                      <label for="answer-id-vertical">Description</label>
						                      <textarea class="editor" cols="80" id="description" name="description" rows="10"></textarea>
						                      <span class="text-danger" id="erdescription"></span>
						                    </div>
						                  </div>
					                  <div class="col-12 d-flex justify-content-end">
					                    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
					                  </div>
					                </div>
					              </div>
					            </form>
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
		$('#our_services').submit(function(event) {
			event.preventDefault();
			var form = $(this)
			var formData = new FormData($('form[name="our_services"]')[0]);
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
							url: "ajax/adding_services.php",
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
									window.location="instructor-dashboard.php";
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
<script src="../ck/build/ckeditor.js"></script>
	<script>ClassicEditor
			.create( document.querySelector( '.editor' ), {
				
				toolbar: {
					items: [
						'heading',
						'|',
						'bold',
						'italic',
						'link',
						'bulletedList',
						'numberedList',
						'|',
						'indent',
						'outdent',
						'|',
						'imageUpload',
						'blockQuote',
						'insertTable',
						'mediaEmbed',
						'undo',
						'redo'
					]
				},
				language: 'en',
				image: {
					toolbar: [
						'imageTextAlternative',
						'imageStyle:full',
						'imageStyle:side'
					]
				},
				table: {
					contentToolbar: [
						'tableColumn',
						'tableRow',
						'mergeTableCells'
					]
				},
				licenseKey: '',
				
			} )
			.then( editor => {
				window.editor = editor;
		
				
				
				
		
				
				
				
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: k2i30chx32nf-8o65j7c6blw0' );
				console.error( error );
			} );
	</script>
</body>
</html>