<?php
require_once('config/functions.php');
require_once('config/db_config.php');
require("../../mail_data/class.phpmailer.php");
$mail = new PHPMailer();

if(is_ajax_request())
{
$user_id  = 1;
$prefix = sanitize_input($_POST['prefix']);
$first_name = sanitize_input($_POST['first_name']);
$last_name = sanitize_input($_POST['last_name']);
$mobile = sanitize_input($_POST['mobile']);
$email = sanitize_input($_POST['email']);
$education_level = sanitize_input($_POST['education_level']);
$area_of_expertise = sanitize_input($_POST['area_of_expertise']);
$address = sanitize_input($_POST['address']);
$password = sanitize_input($_POST['password']);

$resume=$_FILES["resume"]["name"];

$target_dir = '../../uploads/instructor-resumes/';
if (!file_exists($target_dir))
{
mkdir($target_dir, 0777, true);
}

$errors=array();
if ($prefix == '') { $errors['prefix'] = "Required!"; }
if ($first_name == '') { $errors['first_name'] = "Required!"; }
if ($last_name == '') { $errors['last_name'] = "Required!"; }
if ($mobile == '') { $errors['mobile'] = "Required!"; }
if ($email == '') { $errors['email'] = "Required!"; }
if ($education_level == '') { $errors['education_level'] = "Required!"; }
if ($area_of_expertise == '') { $errors['area_of_expertise'] = "Required!"; }
if ($address == '') { $errors['address'] = "Required!"; }
if ($password == '') { $errors['password'] = "Required!"; }

if($resume!='')
{
if(!check_file($resume))
{
$errors['resume'] = "Invalid format. Only pdf, doc and docx allowed!";
}
}

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
$mail->FromName = "You have Inquiry from Instructor Registration - The Details are given below:";
$mail->AddAddress("info@unitedhealthagency.com");
//$mail->addCC("lannyhutchison@gmail.com");
//$mail->addBCC("websitesinquiry@gmail.com");
//$mail->AddReplyTo("mail@mail.com");
$mail->IsHTML(true);
$mail->Subject = "You have Inquiry from Instructor Registration - The Details are given below:";

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
<td width='138' align='left' valign='top' scope='row'>Prefix</td>
<td align='left' valign='top'>:  ".$prefix."</td>
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
<td width='138' align='left' valign='top' scope='row'>Education Levels</td>
<td align='left' valign='top'>: ".$education_level."</td>
<td width='138' align='left' valign='top' scope='row'>Area of Expertise</td>
<td align='left' valign='top'>: ".$area_of_expertise."</td>
<td width='138' align='left' valign='top' scope='row'>Resume</td>
<td align='left' valign='top'>: ".$resume."</td>
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
        $resume = rename_image($resume);
        move_uploaded_file($_FILES["resume"]["tmp_name"],$target_dir.$resume);
        
        $sql = "INSERT INTO instructors (prefix, first_name, last_name, telephone_number, email_address, education_levels, area_of_expertise, address, created_at, ip, resume, password, text_password) 
        VALUES (:prefix, :first_name, :last_name, :telephone_number, :email_address, :education_levels, :area_of_expertise, :address, now(), :ip, :resume, :password, :text_password)";
        $stmt = $db_con->prepare($sql);
        $stmt->bindValue(':prefix', $prefix, PDO::PARAM_STR);
        $stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindValue(':telephone_number', $mobile, PDO::PARAM_STR);
        $stmt->bindValue(':email_address', $email, PDO::PARAM_STR);
        $stmt->bindValue(':education_levels', $education_level, PDO::PARAM_STR);
        $stmt->bindValue(':area_of_expertise', $area_of_expertise, PDO::PARAM_STR);
        $stmt->bindValue(':address', $address, PDO::PARAM_STR);
        $stmt->bindValue(':ip', $ip, PDO::PARAM_STR);
        $stmt->bindValue(':resume', $resume, PDO::PARAM_STR); 
        $stmt->bindValue(':password', md5($password), PDO::PARAM_STR); 
        $stmt->bindValue(':text_password', $password, PDO::PARAM_STR);     
        $inserted = $stmt->execute();
        $last_id = $db_con->lastInsertId();
        if($inserted)
        {
            $mail->MsgHTML($message);
            if(!$mail->Send())
            {
                $status = 'error';
                $msg = 'Problem Sending Mail!';
                exit(json_encode(array('status'=>$status,'msg'=>$msg)));
            }
            else
            {
                $sql = "UPDATE instructors SET email_sent = 0 WHERE instructor_id = :instructor_id";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':instructor_id', $last_id, PDO::PARAM_STR);
            }
// $message_instructor = '
// Hello "'.$prefix.$first_name.$last_name.'",
// Thank you for your interest in United Health Institute. This Email is to inform you that if you are working with UHI then the payout is 70% from total amount of per program.
// Please reach out to us if you have any questions or need additional assistance. ';

// mail($email,"United Health Institute","United Health Institute",$message_instructor);

            $status = 'success';
            $msg = 'You have submitted your request for registration, we will verify your request in 3 to 4 hrs & you will be notify (e-mail) once its get approved.';
            exit(json_encode(array('status'=>$status,'msg'=>$msg)));
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