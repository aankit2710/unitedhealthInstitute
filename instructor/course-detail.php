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
										<h4 class="title float-left">Course Detail</h4>
										<ol class="breadcrumb float-right">
									    	<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
									    	<li class="breadcrumb-item active" aria-current="page">Course Detail</li>
										</ol>
									</nav>
								</div>
								<div class="col-lg-8">
							<div class="courses_single_container">
								<div class="cs_row_one">
									<div class="cs_ins_container">
										<!--<h3 class="cs_title">Designing a Responsive Mobile Website with Muse</h3>-->
										<div class="courses_big_thumb row">
										    <?php
                								$fetch1 = mysqli_query($conn,"SELECT * FROM added_courses WHERE instructor_id=$instructor_id AND course_id = '".$_GET['coures_id']."'");
                                                $num1 = mysqli_num_rows($fetch1);
                                                while($show1 = mysqli_fetch_assoc($fetch1))
                                                {
                                                    $fetch11 = mysqli_query($conn,"SELECT * FROM services WHERE service_id='".$show1['program_id']."'");
                                                    $show11 = mysqli_fetch_assoc($fetch11);
                                                    $srcPath = '../uploads/course-videos/instructor-'.$instructor_id.'/';
                                                    $videoName = json_decode($show1['video_names']);
                                                    //print_r($videoName);
                                                    foreach($videoName as $key => $video_name)
                                                    {
                                                        $video_Name = $video_name;
                                                        $files  =   explode(".",$video_Name);
                                                        
                                                        if($files[1] == 'mp4' || $files[1] == 'avi' || $files[1] == 'mpg' || $files[1] == 'mov' || $files[1] == 'mpeg' || $files[1] == 'webcam' || $files[1] == 'ogg' || $files[1] == 'wmv'){
                                            ?>
											<div class="thumb col-md-4">
											    <video class="" style="width:100%;height:250px;" controls>
                                                  <source src="<?=$srcPath.'/'.$video_Name?>" type="video/mp4">
                                                  Your browser does not support the video tag.
                                                </video>
											</div>
											<?php }}
											
											/*foreach($videoName as $key => $video_name)
                                                    {
                                                        $video_Name = $video_name;
                                                        $files  =   explode(".",$video_Name);
                                                        
                                                        if($files[1] == 'pdf' || $files[1] == 'docx' || $files[1] == 'txt'){
                                            ?>
											<div class="thumb col-md-4">
											    
                                               <object data="<?=$srcPath.'/'.$video_Name?>" type="application/pdf" width="300" height="200">
                                                   <a href="<?=$srcPath.'/'.$video_Name?>">Course Content</a>
                                                </object>

											</div>
											<?php }}*/?>
											<br>
											<div class="thumb col-md-12" style="display: block;">
											    <p style="width:100%">
                                                  <?=$show1['coursecontent']?>
                                                </p>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
						    <div class="bg-light border-right vh-80" id="sidebar-wrapper">
        <div class="sidebar-heading">Course Ebooks and Pdf </div>
        <div class="list-group list-group-flush overflow-auto h-100">
            <?php
            foreach($videoName as $key => $video_name)
                                                    {
                                                        $video_Name = $video_name;
                                                        $files  =   explode(".",$video_Name);
                                                        
                                                        if($files[1] == 'pdf' || $files[1] == 'docx' || $files[1] == 'txt'){
                                            ?>
											<a href="<?=$srcPath.'/'.$video_Name?>" class="list-group-item list-group-item-action bg-light"><?=$video_Name?></a>
											
										
											<?php }}?>
            
        </div>
    </div>
						</div>
<?php include'footer.php'?>
</body>
</html>