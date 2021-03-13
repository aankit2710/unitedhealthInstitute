<?php
require_once('config/functions.php');
require_once('config/db_config.php');
require("../../mail_data/class.phpmailer.php");
$mail = new PHPMailer();

if(is_ajax_request())
{
$user_id  = 1;
$first_name = sanitize_input($_POST['first_name']);
$last_name = sanitize_input($_POST['last_name']);
$mobile = sanitize_input($_POST['mobile']);
$email = sanitize_input($_POST['email']);
$address = sanitize_input($_POST['address']);
$password = sanitize_input($_POST['password']);
$course = sanitize_input($_POST['course']);
$instructor = $_POST['instructor'];

$errors=array();
if ($first_name == '') { $errors['first_name'] = "Required!"; }
if ($last_name == '') { $errors['last_name'] = "Required!"; }
if ($mobile == '') { $errors['mobile'] = "Required!"; }
if ($email == '') { $errors['email'] = "Required!"; }
if ($address == '') { $errors['address'] = "Required!"; }
if ($password == '') { $errors['password'] = "Required!"; }
if ($course == '') { $errors['course'] = "Required!"; }
if ($instructor == '') { $errors['instructor'] = "Required!"; }

if (count($errors) > 0)
{
foreach ($errors as $field_name => $message)
{    
$data['#error_'.$field_name] = $message;
}
$status = 'error';
$msg = 'Invalid request!';
exit(json_encode(array('status'=>$status,'msg'=>$msg, 'data'=>$data)));
}
else
{
$mail->IsSMTP();
$mail->Host = "localhost";
$mail->SMTPAuth = false;
$mail->SMTPSecure = "false";
$mail->Port = 25;
$mail->Username = "enquiry@nibbanah.com";
$mail->Password = "lc)fYqqE7w8*";
$mail->From = "enquiry@nibbanah.com";
$mail->FromName = "You have Inquiry from Student Registration - The Details are given below:";
$mail->AddAddress("info@unitedhealthagency.com");
//$mail->addCC("lannyhutchison@gmail.com");
//$mail->addBCC("websitesinquiry@gmail.com");
//$mail->AddReplyTo("mail@mail.com");
$mail->IsHTML(true);
$mail->Subject = "You have Inquiry from Student Registration - The Details are given below:";

$message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Instructor Registration</title>
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
</head>
<body>
<table class='table table-bordered' cellspacing='0' cellpadding='4' style='border:1px solid #000;'>
<tr>
<td colspan='8'><b>Personal Information</b></td>
</tr>
<tr>
<td width='138' align='left' valign='top' scope='row'>First Name</td>
<td align='left' valign='top'>:  ".$first_name."</td>
<td width='138' align='left' valign='top' scope='row'>Last Name</td>
<td align='left' valign='top' colspan='6'>: ".$last_name."</td>
</tr>
<tr>
<td width='138' align='left' valign='top' scope='row'>Phone</td>
<td align='left' valign='top'>: ".$mobile."</td>
<td width='138' align='left' valign='top' scope='row'>Email</td>
<td align='left' valign='top' colspan='6'>: ".$email."</td>
</tr>
<tr>
<td width='138' align='left' valign='top' scope='row'>Address</td>
<td align='left' valign='top'>: ".$address."</td>
</tr>
</table>
</body>
</html>";
$ip = getClientIP();
    try
    {
        $sql = "INSERT INTO students (first_name, last_name, telephone_number, email_address, address, created_at, ip, password, text_password, instructor_id) 
        VALUES (:first_name, :last_name, :telephone_number, :email_address, :address, now(), :ip, :password, :text_password, :instructor_id)";
        $stmt = $db_con->prepare($sql);
        $stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindValue(':telephone_number', $mobile, PDO::PARAM_STR);
        $stmt->bindValue(':email_address', $email, PDO::PARAM_STR);
        $stmt->bindValue(':address', $address, PDO::PARAM_STR);
        $stmt->bindValue(':ip', $ip, PDO::PARAM_STR); 
        $stmt->bindValue(':password', md5($password), PDO::PARAM_STR); 
        $stmt->bindValue(':text_password', $password, PDO::PARAM_STR);  
        $stmt->bindValue(':instructor_id', $instructor, PDO::PARAM_STR);    
        $inserted = $stmt->execute();
        $last_id = $db_con->lastInsertId();
        if($inserted)
        {
            // $mail->MsgHTML($message);
            // if(!$mail->Send())
            // {
            //     $status = 'error';
            //     $msg = 'Problem Sending Mail!';
            //     exit(json_encode(array('status'=>$status,'msg'=>$msg)));
            // }
            // else
            // {
            //     $sql = "UPDATE students SET email_sent = 0 WHERE student_id = :student_id";
            //     $stmt = $db_con->prepare($sql);
            //     $stmt->bindParam(':student_id', $last_id, PDO::PARAM_STR);
            // }
            
            $enrollDate = date('Y-m-d H:i:s');
            $category_details = explode("+",$course);
            $sql = "INSERT INTO course_orders (enrolled_category, enrolled_course, enrolled_date, student_id, instructor_id, created, ip) 
            VALUES (:enrolled_category, :enrolled_course, :enrolled_date, :student_id, :instructor_id, now(), :ip)";
            $stmt = $db_con->prepare($sql);
            $stmt->bindValue(':enrolled_category', $category_details[1], PDO::PARAM_STR);
            $stmt->bindValue(':enrolled_course', $category_details[0], PDO::PARAM_STR);
            $stmt->bindValue(':enrolled_date', $enrollDate, PDO::PARAM_STR);
            $stmt->bindValue(':student_id', $last_id, PDO::PARAM_STR);
            $stmt->bindValue(':ip', $ip, PDO::PARAM_STR); 
            $stmt->bindValue(':instructor_id', $instructor, PDO::PARAM_STR);    
            $inserted = $stmt->execute();
            
            $status = 'success';
            $msg = 'Registered Successfully!';
            $data = $last_id;
            exit(json_encode(array('status'=>$status,'msg'=>$msg,'data'=>$data)));
        }
        else
        {
            $status = 'error';
            $msg = 'Not Registered!';
            exit(json_encode(array('status'=>$status,'msg'=>$msg)));
        }
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
}
}
else
{
  show_404();
}
?>