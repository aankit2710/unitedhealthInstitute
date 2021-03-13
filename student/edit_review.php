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
	<link rel="stylesheet" type="text/css" href="../adminiar/app-assets/css/rating.css">
	<link rel="stylesheet" type="text/css" href="../adminiar/app-assets/css/bootstrap-extended.min.css">
	<link rel="stylesheet" type="text/css" href="../adminiar/app-assets/css/rating.css">
	<link rel="stylesheet" type="text/css" href="../adminiar/app-assets/vendors/css/vendors.min.css">
	
	<script src="../ck/build/ckeditor.js"></script>
	
<?php include'header.php';
$id = $_GET['id'];
?>

<?php
    if(isset($_POST['review_submit']))
{
$c_name = $_POST['c_name'];
$heading = $_POST['heading'];
$c_review = $_POST['c_review'];
$score = $_POST['score'];
$t_name = $_POST['t_name'];
$co_name = $_POST['co_name'];
$imgfile=$_FILES["profile_pic"]["name"];

$target_dir = '../uploads/reviews/';
if (!file_exists($target_dir))
{
mkdir($target_dir, 0777, true);
}
$sqll = "UPDATE reviews_detail SET c_name = '".$c_name."', heading ='".$heading."', c_review ='".$c_review."', teacher_name ='".$t_name."', course_name ='".$co_name."', rating ='".$score."', modified_date = now(), review_image ='".$review_image."' WHERE user_id = 1 AND review_id ='".$id."'";

  $insert = mysqli_query($conn,$sqll);
   
	if($insert)
		{
			echo "<script>alert('Updated Successfully');</script>";
			header("Location: http://www.geeksforgeeks.org"); 
			?>
			<script>
			swal("Inserted");
									setTimeout(function(){
										window.location.reload();
									},1000);
            </script>
            <?php
		}
	  
  }
  ?>

<?php include'sidebar.php'?>
	<!-- BEGIN: Content-->
	<div class="app-content content col-12">
		<div class="content-overlay"></div>
		<div class="content-wrapper">
			<div class="content-header row">
				<div class="content-header-left col-12 mb-2 mt-1">
					<div class="row breadcrumbs-top">
						<div class="col-12">
							<h5 class="content-header-title float-left pr-1 mb-0">Reviews</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Reviews
									</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="content-body">
				<section class="page-user-profile">
					<div class="row">
						<div class="col-6" style="margin:auto;">
							<form class="form form-vertical" method="post" action="#" enctype="multipart/form-data">
						              <div class="form-body">
						                  <?php
				                                	
                    								$fetch111 = mysqli_query($conn,"SELECT * FROM reviews_detail WHERE review_id = '$id'");
                                                    $num111 = mysqli_num_rows($fetch111);
                                                    if($num111 > 0){
                                                    $data = mysqli_fetch_assoc($fetch111);
                                                    
														$review_id = $data['review_id'];
                                                		$c_name = $data['c_name'];
                                                		$heading = $data['heading'];
                                                		$c_review = $data['c_review'];
                                                		$rating = $data['rating'];
                                                		$status = $data['status'];
                                                		$pic = $data['review_image'];
                                                		$co_name = $data['course_name'];
                                                		$t_name = $data['teacher_name'];
                                                    }
				                                	
				                                	?>
						                  
						                <div class="row">
						                    <div class="col-6" style="margin:auto;">
											<div class="rounded mr-75" id="preview_pic" style="width: 200px;height: auto;text-align:center">
											    <img src='<?=($pic)?"../uploads/reviews/$pic":"http://www.webcoderskull.com/img/team4.png"?>' alt="avatar" style="width: 150px;height: auto;">
											</div>
										</div>
										<div class="col-7" style="margin:20px auto;height: 26px;text-align: center;">
											<div id="profileImageBox" class="media-body mt-25">
    							                <input type="file" name="profile_pic" class="form-control-file" id="profileImageFile" value="<?=$pic?>" accept="image/*" data-validation-callbacks=""/>
    											<p class="text-muted ml-1 mt-50 text-center"><small>Allowed JPG, GIF or PNG. Max size of 800kB</small></p>
    							                <span id="erprofile_pic" style="color:red;"></span>
							                </div>
										</div>
						                  
						                  <div class="col-12">
						                    <div class="form-group">
						                      <label for="question-vertical">Student Name</label>
						                      <input type="text" id="c_name" class="form-control" name="c_name" readonly  value='<?=($c_name)?"$c_name":""?>'>
						                        <span class="text-danger" id="erc_name"></span>
						                    </div>
						                  </div>
						                  <div class="col-12">
						                    <div class="form-group">
						                      <label for="question-vertical">Heading</label>
						                      <input type="text" id="heading" class="form-control" name="heading"
						                        placeholder="Heading" value='<?=($heading)?"$heading":""?>'>
						                        <span class="text-danger" id="erheading"></span>
						                    </div>
						                  </div>
						                  <div class="col-12">
						                    <div class="form-group">
						                      <label for="question-vertical">Teacher Name</label>
						                      <input type="text" id="t_name" class="form-control" name="t_name"
						                        value='<?=($t_name)?"$t_name":""?>'>
						                        <span class="text-danger" id="ert_name"></span>
						                    </div>
						                  </div>
						                  
						                  <div class="col-12">
						                    <div class="form-group">
						                      <label for="question-vertical">Course Name</label>
						                      <input type="text" id="co_name" class="form-control" name="co_name"
						                        value='<?=($co_name)?"$co_name":""?>'>
						                        <span class="text-danger" id="erco_name"></span>
						                    </div>
						                  </div>
						                  
						                  <div class="col-12">
						                    <div class="form-group">
						                      <label for="answer-id-vertical">Review</label>
						                      <textarea class="editor" cols="80" id="c_review" name="c_review" rows="10"><?=($c_review)?"$c_review":""?></textarea>
						                      <span class="text-danger" id="erc_review"></span>
						                    </div>
						                  </div>
						                  <div class="col-12">
						                    <div class="form-group">
						                      	<label for="question-vertical">Rating</label>
						                      	<fieldset class="score">  
												  <input type="radio" id="score-5" name="score" value="5" <?php if($rating==5){echo 'checked';} ;?>/>
												  <label title="5 stars" for="score-5">5 stars</label>
												  <input type="radio" id="score-4" name="score" value="4" <?php if($rating==4){echo 'checked';} ;?>/>
												  <label title="4 stars" for="score-4">4 stars</label>
												  <input type="radio" id="score-3" name="score" value="3" <?php if($rating==3){echo 'checked';} ;?>/>
												  <label title="3 stars" for="score-3">3 stars</label>
												  <input type="radio" id="score-2" name="score" value="2" <?php if($rating==2){echo 'checked';} ;?>/>
												  <label title="2 stars" for="score-2">2 stars</label>
												  <input type="radio" id="score-1" name="score" value="1" <?php if($rating==1){echo 'checked';} ;?>/>
												  <label title="1 stars" for="score-1">1 stars</label>
												</fieldset>
						                        <span class="text-danger" id="erscore"></span>
						                    </div>
						                    <input type="hidden" name="review_id" value="<?=$review_id?>">
						                  </div>
						                  <div class="col-12 d-flex justify-content-end">
						                    <button type="submit" class="btn btn-primary mr-1 mb-1" name="review_submit">Submit</button>
						                  </div>
						                </div>
					              	</div>
						            </form>
						</div>
					</div>						
				
				</section>
			</div>
		</div>
	</div>
	<!-- END: Content-->
    
  <?php include'footer.php'?>
	
	<script type="text/javascript">
		$(".remove").click(function(){
			var id = $(this).attr("id");
			swal({
				type: 'warning',
				title: "Are you sure?",
				text: "You will not be able to recover this!",
				showCancelButton: true,
				width: 400,
				confirmButtonText: 'Yes',
				showLoaderOnConfirm: true,
				preConfirm: function() {
					return new Promise(function(resolve) {
						$.ajax({
							url: "../adminiar/ajax/delete-review-async.php",
							method:'POST',
							data: {id:id},
							dataType: 'json',
							success: function (jSon)
							{
								if (jSon.status == 'success')
								{
									swal("Deleted!", jSon.msg, "success");
									setTimeout(function(){
										window.location.reload();
									},1000);
								}
								else if (jSon.status == 'error') {
									swal("Cancelled", "jSon.msg", "error");
									setTimeout(function(){
										window.location.reload();
									},1000);
								}
								else
								{
									swal(jSon.msg);
									setTimeout(function(){
										window.location.reload();
									},1000);
								}
							},
							error: function()
							{
								swal('Something is wrong');
							}
						});
					})
				},
				allowOutsideClick: function () {
					!swal.isLoading()
				}
			}).catch(swal.noop);
		});
	</script>
		<script>
    	$('#profileImageFile').change(function(e) {
    		var input = this;
    		var _URL = window.URL || window.webkitURL;
    		img = new Image();
    		var fileType = input.files[0];
    		var ext=fileType['type'];
    		if ($.inArray(ext.toLowerCase(), ['image/jpg', 'image/jpeg', 'image/png']) == -1) {
    			$('#profileImageFile').val('')
    			$('#preview_pic').html('')
    			swal(" Please select a valid file jpeg, jpg, png type allowed .");
    		}else{
    			img.src = _URL.createObjectURL(input.files[0]);
    			img.onload = function () {
    				var w = this.width;
    				var h = this.height;
    				if (input.files && input.files[0]) {
    					if ((input.files[0].size) < (Math.pow(Math.pow(2,10),2) * 8)  && (w<=413 && h<=531)) {
    						var reader = new FileReader();
    						reader.onload = function (e) {
    							$('#preview_pic').html($('<img/>',{
    								src: e.target.result,
    								width: '100%',
    								height: '100%'
    							}))
    							var delete_icon ='<div id="profileImageFile__Name" class="text-center">'
    							+'<a href="javascript:;" class="btn btn-sm btn btn_text_white plain_red" id="profileImageFile__Delete"><i class="fa fa-trash icon_p_rt5" aria-hidden="true"></i>Remove Image</a>'
    							+'</div>'
    							$('#profileImageFileInstruction').hide()
    							$('#profileImageBox').hide().after(delete_icon)
    						};
    						reader.readAsDataURL(input.files[0]);
    					} else {
    						$('#profileImageFile').val('')
    						$('#preview_pic').html('')
    						swal("The file is larger than the permitted size.");
    					}
    				} else {
    					swal("Image not uploaded");
    					$('#profileImageFile').val('')
    					$('#preview_pic').html('')
    				}
    			};
    		}
    	});
    	// Remove choosen image
    	$('body').on('click', '#profileImageFile__Delete', function(){
    		$('#profileImageFile').val('')
    		$('#preview_pic').html('')
    		$(this).parents('#profileImageFile__Name').remove()
    		$('#profileImageFileInstruction').show()
    		$('#profileImageBox').show()
    	});
    </script>
    
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