<?php
require_once('auth_session.php');
require_once('config/functions.php');
require_once('config/db_config.php');
$ip = getClientIP();
require_once('getid3/getid3/getid3.php');
$getID3 = new getID3;

$course = $_POST['course'];
$program = $_POST['program'];
$coursedetail = $_POST['coursedetail'];
$coursecontent =$_POST['courseContent'];

if(!empty($_FILES['files'])){
    
    $n=0;
    $s=0;
    $prepareNames   =   array();
    foreach($_FILES['files']['name'] as $val)
    {
        $infoExt        =   $getID3->analyze($_FILES['files']['tmp_name'][$n]);
        //print_r($infoExt);die;
        $s++;
        $filesName      =   str_replace(" ","",trim($_FILES['files']['name'][$n]));
        $files          =   explode(".",$filesName);
        echo $File_Ext       =   substr($_FILES['files']['name'][$n], strrpos($_FILES['files']['name'][$n],'.'));
         
        if($infoExt['mime_type'] == 'video/mpeg' || $infoExt['mime_type'] == 'video/mp4' || $infoExt['mime_type'] == 'video/ogg' || $infoExt['mime_type'] == 'video/webcam' 
        || $infoExt['mime_type'] == 'video/avi' || $infoExt['mime_type'] == 'video/mpg' || $infoExt['mime_type'] == 'video/mov' || $infoExt['mime_type'] == 'video/wmv'
        || $infoExt['mime_type'] == 'application/pdf')
        {
            $srcPath = '../../uploads/course-videos/instructor-'.$instructor_id.'/';
            if (!file_exists($srcPath))
            {
            mkdir($srcPath, 0777, true);
            }

            $fileName   =   $s.rand(0,999).time().$File_Ext;
            $path   =   trim($srcPath.$fileName);
            if(move_uploaded_file($_FILES['files']['tmp_name'][$n], $path))
            {
                $prepareNames[] .=  $fileName; //need to be fixed.
                $Sflag      =   1; // success
            }
            else
            {
                $Sflag  = 2; // file not move to the destination
            }
        }
        else
        {
            $Sflag  = 3; //extention not valid
        }
        $n++;
    }
    if($Sflag==1)
    {
        $playtime_string = $infoExt['playtime_string'];
        $videosize = $infoExt['filesize'];
        $video_resolution = $infoExt['video']['resolution_x'].'x'.$infoExt['video']['resolution_y'];
        
        if(!empty($prepareNames))
        {
            $count  =   1;
            // foreach($prepareNames as $name)
            // {
            //     $videos = json_encode($name);
            // }
            
            $videos = json_encode($prepareNames);
            
            $sql = "INSERT INTO added_courses (instructor_id, category_name, coursecontent, coursedetail, video_names, playtime_string, videosize, video_resolution, ip, created, program_id)
            VALUES (:instructor_id, :category_name, :coursecontent, :coursedetail, :video_names, :playtime_string, :videosize, :video_resolution, :ip, now(), :program_id)";
            $stmt = $db_con->prepare($sql);
            $stmt->bindValue(':video_names', $videos, PDO::PARAM_STR);
            $stmt->bindValue(':playtime_string', $playtime_string, PDO::PARAM_STR);  
            $stmt->bindValue(':videosize', $videosize, PDO::PARAM_STR);  
            $stmt->bindValue(':video_resolution', $video_resolution, PDO::PARAM_STR);
            $stmt->bindValue(':ip', $ip, PDO::PARAM_STR);  
            $stmt->bindValue(':instructor_id', $instructor_id, PDO::PARAM_INT); 
            $stmt->bindValue(':coursecontent', $coursecontent, PDO::PARAM_STR);
            $stmt->bindValue(':coursedetail', $coursedetail, PDO::PARAM_STR);
            $stmt->bindValue(':category_name', $program, PDO::PARAM_STR); 
            $stmt->bindValue(':program_id', $course, PDO::PARAM_INT);    
            $inserted = $stmt->execute();
        }

        $status = 'success';
        $msg = 'Course Added Successfully!';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
    }
    else if($Sflag==2)
    {
        $status = 'error';
        $msg = 'File not move to the destination.';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
    }
    else if($Sflag==3)
    {
        $status = 'error';
        $msg = 'File extention not good. Try with .PNG, .JPEG, .GIF, .JPG';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
    }
}
?>