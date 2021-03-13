<?php
require_once('config/functions.php');
require_once('config/db_config.php');

if(is_ajax_request())
{
$student_id = sanitize_input($_POST['student_id']);
$first_name = sanitize_input($_POST['first_name']);
$last_name = sanitize_input($_POST['last_name']);
$telephone_number = sanitize_input($_POST['telephone_number']);
$address = sanitize_input($_POST['address']);

$imgfile=$_FILES["profile_pic"]["name"];

$target_dir = '../../uploads/profile/student-pics/';
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
  		$stmt = $db_con->prepare("SELECT profile_pic FROM students WHERE student_id=:student_id");  
    	$stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);   
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

	    	$sql = "UPDATE students SET first_name = :first_name, last_name = :last_name, telephone_number = :telephone_number, address = :address, profile_pic = :profile_pic,
	    	ip = :ip, modified_at = now() WHERE student_id = :student_id";
	    	$stmt = $db_con->prepare($sql);
	    	$stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
	    	$stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
	    	$stmt->bindParam(':telephone_number', $telephone_number, PDO::PARAM_STR);
	    	$stmt->bindParam(':address', $address, PDO::PARAM_STR);
	    	$stmt->bindParam(':profile_pic', $imgnewfile, PDO::PARAM_STR);
	    	$stmt->bindParam(':ip', $ip, PDO::PARAM_STR);  
	    	$stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);   
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