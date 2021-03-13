<?php
require_once('auth_session.php');
require_once('config/functions.php');
require_once('config/db_config.php');

if(is_ajax_request())
{
$old_pass = sanitize_input($_POST['old_pass']);
$new_pass = sanitize_input($_POST['new_pass']);
$confirm_pass = sanitize_input($_POST['confirm_pass']);

$errors=array();
if ($old_pass == '') { $errors['old_pass'] = "Password is Required!"; }
if ($new_pass == '') { $errors['new_pass'] = "Password is Required!"; }
if ($confirm_pass == '') { $errors['confirm_pass'] = "Confirm Password is Required!"; }

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
  	{       //print_r($_POST);die;
      	    $stmt = $db_con->prepare("SELECT * FROM students WHERE student_id=:student_id");  
            $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);   
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();
            extract($row);
            
            
            if($row['text_password'] != $old_pass)
            {
                //print_r($_POST);die;
                $status = 'error';
                $msg = 'Old Password is Not Correct!';
                exit(json_encode(array('status'=>$status,'msg'=>$msg)));
            }
            elseif($confirm_pass != $new_pass)
            {
                $status = 'error';
                $msg = 'Confirm Password and New Password Not Matching!';
                exit(json_encode(array('status'=>$status,'msg'=>$msg)));
            }
            else
            {
      	        $password = md5($new_pass);
      	        $text_password = $new_pass;
      		    $sql = "UPDATE students SET password = :password, text_password = :text_password, ip = :ip, modified_at = now() WHERE student_id = :student_id";
                $stmt = $db_con->prepare($sql);
    		    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    		    $stmt->bindParam(':text_password', $text_password, PDO::PARAM_STR);
    		    $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
    		    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);   
    		    $updated = $stmt->execute();
    	    	if($updated)
    	    	{
    	    		$status = 'success';
    				$msg = 'Password Changed Successfully!';
    				exit(json_encode(array('status'=>$status,'msg'=>$msg)));
    	    	}
    	    	else
    	    	{
    	    		$status = 'error';
    				$msg = 'Not Changed!';
    				exit(json_encode(array('status'=>$status,'msg'=>$msg)));
    	    	}
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