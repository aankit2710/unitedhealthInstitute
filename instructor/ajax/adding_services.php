<?php
require_once('config/functions.php');
require_once('config/db_config.php');

if(is_ajax_request())
{

$service_name = sanitize_input($_POST['service_name']);
$category_name = sanitize_input($_POST['category_name']);
$description = sanitize_input($_POST['description']);
$program_name = sanitize_input($_POST['program_name']);

$imgfile=$_FILES["profile_pic"]["name"];
$user_id = 1;
$imgfile=$_FILES["profile_pic"]["name"];

$target_dir = '../../uploads/profile/instructor-pics/';
if (!file_exists($target_dir))
{
mkdir($target_dir, 0777, true);
}

$errors=array();
//$errors=array('username','name','about_content1','company_name','website');
/*if ($first_name == '') { $errors['first_name'] = "First Name is Required!"; }
if (!checkInput($first_name)) { $errors['first_name'] = "Only letters allowed!"; }
if ($last_name == '') { $errors['last_name'] = "Last Name is Required!"; }
if (!checkInput($last_name)) { $errors['last_name'] = "Only letters allowed!"; }
if ($telephone_number == '') { $errors['telephone_number'] = "Telephone Number is Required!"; }
if ($address == '') { $errors['address'] = "Address is Required!"; }
if ($education_level == '') { $errors['education_levels'] = "Education is Required!"; }
if ($area_of_expertise == '') { $errors['skills'] = "Skills is Required!"; }
if ($experience == '') { $errors['experience'] = "Experience is Required!"; }
if ($languages == '') { $errors['languages'] = "Languages is Required!"; }
if ($introduction == '') { $errors['introduction'] = "Introduction is Required!"; }*/
if (count($errors) > 0)
{
foreach ($errors as $field_name => $message)
{    
$data['#er'.$field_name] = $message;
}
$status = 'error';
$msg = 'Invalid request!';
exit(json_encode(array('status'=>$status,'msg'=>$msg, 'data'=>$data)));
}
else
{
	$ip = getClientIP();
  	try
  	{   
			if($imgfile)
      	    {
          	    //unlink($target_dir.$row['profile_pic']);
                if(!check_image($imgfile))
                {
                    $errors['profile_pic'] = "Invalid format. Only jpg / jpeg/ png /gif format allowed!";
                }
          	    $imgnewfile = rename_image($imgfile);
          	    move_uploaded_file($_FILES["profile_pic"]["tmp_name"],$target_dir.$imgnewfile);
      	    }
      	    else
            {
               // if no image selected the old image remain as it is.
               $imgnewfile = $row['profile_pic']; // old image from database
            }
            
                //print_r($first_name);die;

	    	$sql = "INSERT INTO services (user_id, category_name, service_name, program_name, content, service_image, ip, created_date) 
	    VALUES (:user_id, :category_name, :service_name, :program_name, :content, :service_image, :ip, now())";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindValue(':category_name', $category_name, PDO::PARAM_STR);
	    $stmt->bindValue(':service_name', $service_name, PDO::PARAM_STR);
	    $stmt->bindValue(':program_name', $program_name, PDO::PARAM_STR);
	    $stmt->bindValue(':content', $description, PDO::PARAM_STR);
	    $stmt->bindValue(':service_image', $imgnewfile, PDO::PARAM_STR);
	    $stmt->bindValue(':ip', $ip, PDO::PARAM_STR);  
	    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);    
	    $inserted = $stmt->execute();
    	if($inserted)
    	{
    		$status = 'success';
			$msg = 'Inserted Successfully!';
			exit(json_encode(array('status'=>$status,'msg'=>$msg)));
    	}
    	else
    	{
    		$status = 'error';
			$msg = 'Not Inserted!';
			exit(json_encode(array('status'=>$status,'msg'=>$msg)));
    	}
	    }

  	
  	catch(PDOException $e){
    	echo $e->getMessage();
  	}
}
}
else
{
	show_404();
}
?>

