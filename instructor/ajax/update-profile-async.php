<?php
require_once('config/functions.php');
require_once('config/db_config.php');

if(is_ajax_request())
{

$instructor_id = sanitize_input($_POST['instructor_id']);
$first_name = sanitize_input($_POST['first_name']);
$last_name = sanitize_input($_POST['last_name']);
$telephone_number = sanitize_input($_POST['telephone_number']);
$address = sanitize_input($_POST['address']);
$education_level = sanitize_input($_POST['education_levels']);
$area_of_expertise = sanitize_input($_POST['skills']);
$experience = sanitize_input($_POST['experience']);
$languages = sanitize_input($_POST['languages']);
$introduction = sanitize_input($_POST['introduction']);

$imgfile=$_FILES["profile_pic"]["name"];

$target_dir = '../../uploads/profile/instructor-pics/';
if (!file_exists($target_dir))
{
mkdir($target_dir, 0777, true);
}

$errors=array();
//$errors=array('username','name','about_content1','company_name','website');
if ($first_name == '') { $errors['first_name'] = "First Name is Required!"; }
if (!checkInput($first_name)) { $errors['first_name'] = "Only letters allowed!"; }
if ($last_name == '') { $errors['last_name'] = "Last Name is Required!"; }
if (!checkInput($last_name)) { $errors['last_name'] = "Only letters allowed!"; }
if ($telephone_number == '') { $errors['telephone_number'] = "Telephone Number is Required!"; }
if ($address == '') { $errors['address'] = "Address is Required!"; }
if ($education_level == '') { $errors['education_levels'] = "Education is Required!"; }
if ($area_of_expertise == '') { $errors['skills'] = "Skills is Required!"; }
if ($experience == '') { $errors['experience'] = "Experience is Required!"; }
if ($languages == '') { $errors['languages'] = "Languages is Required!"; }
if ($introduction == '') { $errors['introduction'] = "Introduction is Required!"; }
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
  		$stmt = $db_con->prepare("SELECT profile_pic FROM instructors WHERE instructor_id=:instructor_id");  
    	$stmt->bindParam(':instructor_id', $instructor_id, PDO::PARAM_INT);   
    	$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$count = $stmt->rowCount();
		extract($row);

		if($count == 1)
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

	    	$sql = "UPDATE instructors SET first_name = :first_name, last_name = :last_name, telephone_number = :telephone_number, introduction = :introduction, address = :address, profile_pic = :profile_pic,
	    	ip = :ip, modified_at = now(), area_of_expertise = :area_of_expertise, education_levels = :education_levels, experience = :experience, languages = :languages WHERE instructor_id = :instructor_id";
	    	$stmt = $db_con->prepare($sql);
	    	$stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
	    	$stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
	    	$stmt->bindParam(':telephone_number', $telephone_number, PDO::PARAM_STR);
	    	$stmt->bindParam(':address', $address, PDO::PARAM_STR);
	    	$stmt->bindParam(':introduction', $introduction, PDO::PARAM_STR);
	    	$stmt->bindParam(':profile_pic', $imgnewfile, PDO::PARAM_STR);
            $stmt->bindParam(':education_levels', $education_level, PDO::PARAM_STR);
            $stmt->bindParam(':area_of_expertise', $area_of_expertise, PDO::PARAM_STR);
            $stmt->bindParam(':experience', $experience, PDO::PARAM_STR);
            $stmt->bindParam(':languages', $languages, PDO::PARAM_STR);
	    	$stmt->bindParam(':ip', $ip, PDO::PARAM_STR);  
	    	$stmt->bindParam(':instructor_id', $instructor_id, PDO::PARAM_INT);   
	    	$updated = $stmt->execute();

	    	if($updated)
	    	{
	    		$status = 'success';
				$msg = 'Updated Successfully!';
				exit(json_encode(array('status'=>$status,'msg'=>$msg)));
	    	}
	    	else
	    	{
	    		$status = 'error';
				$msg = 'Not Updated!';
				exit(json_encode(array('status'=>$status,'msg'=>$msg)));
	    	}
	    }
	    else
	    {   
	        $status = 'error';
			$msg = 'Some Error Occoured!';
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