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
<link rel="stylesheet" type="text/css" href="app-assets/dropzone/dropzone.css">

<script src="../ck/build/ckeditor.js"></script>
<?php include'header.php'?>
<?php include'sidebar.php'?>
<div class="col-lg-12">
									<nav class="breadcrumb_widgets" aria-label="breadcrumb mb30">
										<h4 class="title float-left">Add Video</h4>
										<ol class="breadcrumb float-right">
									    	<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
									    	<li class="breadcrumb-item active" aria-current="page">Add Video</li>
										</ol>
									</nav>
								</div>
								<div class="col-lg-12">
									<div class="my_course_content_container">
										<div class="my_setting_content mb30">
											<div class="my_setting_content_header style2">
												<div class="my_sch_title">
													<h4 class="m0">Add Information</h4>
												</div>
											</div>
											
    											<div class="row my_setting_content_details">
    												<div class="col-md-12">
    													<div class="my_profile_select_box tt_video form-group">
    												    	<label for="exampleFormControlInput5">Choose Department</label><br>
    												    	<option value="">Select Department</option>
    												    	<select class="selectpicker" id="course" name="course">
    															<?php
    															$fetch1 = mysqli_query($conn,"SELECT DISTINCT service_name FROM services WHERE user_id=1");
                                                                $num1 = mysqli_num_rows($fetch1);
                                                                while($show1 = mysqli_fetch_assoc($fetch1))
                                                                {
                                                                ?>
                                                                <option value="<?=$show1['service_name']?>"><?=$show1['service_name']?></option>
                                                                <?php
                                                                }
    															?>
    														</select>
    													</div>
    												</div>
    												<div class="col-md-12">
    													<div class="my_profile_select_box tt_video form-group">
    												    	
    												    	<option value="">Select Program</option>
    												    	<select class="selectpicker" id="program" name="program">
    															<?php
    															$fetch11 = mysqli_query($conn,"SELECT DISTINCT program_name FROM services WHERE user_id=1");
                                                                $num11 = mysqli_num_rows($fetch11);
                                                                while($show11 = mysqli_fetch_assoc($fetch11))
                                                                {
                                                                ?>
                                                                <option value="<?=$show11['program_name']?>"><?=$show11['program_name']?></option>
                                                                <?php
                                                                }
    															?>
    														</select>
    													</div>
    												</div>
    												
    												<div class="col-md-12">
    													<div class="my_profile_select_box tt_video form-group">
    												    	
    												    	<option value="">Select Course</option>
    												    	<select class="selectpicker" id="coursedetail" name="coursedetail">
    															<?php
    															$fetch1 = mysqli_query($conn,"SELECT DISTINCT category_name FROM services WHERE user_id=1");
                                                                $num1 = mysqli_num_rows($fetch1);
                                                                while($show1 = mysqli_fetch_assoc($fetch1))
                                                                {
                                                                ?>
                                                                <option value="<?=$show1['category_name']?>"><?=$show1['category_name']?></option>
                                                                <?php
                                                                }
    															?>
    														</select>
    														
    													</div>
    												</div>
    												<div class="col-md-12">
    													<div class="my_profile_setting_input form-group">
    												    	<label for="formGroupExampleInputZ">Video or Ebook or Any other PDF</label>
    												    	<div class="dropzone dz-clickable" id="myDrop">
                												<div class="dz-default dz-message" data-dz-message="">
                													<span>Drop files here to upload</span>
                												</div>
                											</div>
    													</div>
    												</div>
    												
    												<div class="col-md-12">
                                                      <div class="my_profile_setting_input form-group" > 
                                                        <label>Course Content</label> 
                                                        <div id="editor">
                                                        <textarea class="form-control editor" type="text" name="courseContent" id="courseContent" rows="4" cols="50" style="height: auto;"> <?=$courseContent?> </textarea>
                                                      </div>
                                                      </div>
                                                    </div>
    											    <div class="col-md-12">
    													<button type="submit"  id="add_video" class="my_setting_savechange_btn btn btn-thm">Save <span class="flaticon-right-arrow-1 ml15"></span></button>
    											    </div>
    											</div>
										</div>
									</div>
								</div>
<?php include'footer.php'?>
<script src="app-assets/dropzone/dropzone.js"></script>
<script>
	var $ = jQuery.noConflict();
	Dropzone.autoDiscover = false;
	$(document).ready(function(){
		$(function() {
			$("#myDrop").sortable({
				items: '.dz-preview',
				cursor: 'move',
				opacity: 0.5,
				containment: '#myDrop',
				distance: 20,
				tolerance: 'pointer',
			});
			$("#myDrop").disableSelection();
		});
		
			//Dropzone script
			Dropzone.autoDiscover = false;
			
			var myDropzone = new Dropzone("div#myDrop",
			{
				paramName: "files", // The name that will be used to transfer the file
				addRemoveLinks: true,
				uploadMultiple: true,
				autoProcessQueue: false,
				parallelUploads: 50,
				maxFilesize: 100, // MB
				acceptedFiles: ".mp4, .ogg, .webcam, .mpeg, .avi, .mpg, .mov, .wmv, .pdf, .docx, .txt",
				url: "ajax/add-course-video.php",
			});
			
			myDropzone.on("sending", function(file, xhr, formData) {
				var filenames = [];
				$('.dz-preview .dz-filename').each(function() {
					filenames.push($(this).find('span').text());
				});
				var courseContent = editor.getData();
				var value = $('#course').val();
				var program = $('#program').val();
				var coursedetail = $('#coursedetail').val();
				
				
				formData.append('courseContent', courseContent);
				formData.append("course", value);
				formData.append("program", program);
				formData.append("coursedetail", coursedetail);
				formData.append('filenames', filenames);
			});
			
			/* Add Files Script*/
			myDropzone.on("success", function(jSon){
				if (jSon.status == 'success')
				{
					swal({
						type: 'success',
						text: 'Course Added Successfully!',
						showConfirmButton: false,
						timer:1500,
						showConfirmButton: false
					});
					//window.location.reload();
				}
				else if (jSon.status == 'error')
				{
					ALSP.f.fade_msg(jSon.msg,'error');
					$.each(jSon.data, function(index, val) {
						$(index).html(val);
					})
				}
				else
				{
					swal(jSon.msg);
					setTimeout(function(){
					// window.location.reload();
				},1000);
				}
			});
			
			myDropzone.on("error", function (data) {
				swal('Something Went Wrong!');
			});
			
			myDropzone.on("complete", function(file) {
				myDropzone.removeFile(file);
			});
			
			$("#add_video").on("click",function (){
				myDropzone.processQueue();
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