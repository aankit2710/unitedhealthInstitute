<?php
require_once('adminiar/includes/config/functions.php');
require_once('adminiar/includes/config/db_config.php');
require("mail_data/class.phpmailer.php");
$mail = new PHPMailer();

if(is_ajax_request())
{
$user_id  = 1;
$name = sanitize_input($_POST['name']);
$phone = sanitize_input($_POST['phone']);
$email = sanitize_input($_POST['email']);

$errors=array();
if ($name == '') { $errors['name'] = "Name is Required!"; }
if ($phone == '') { $errors['phone'] = "Phone Number is Required!"; }
if ($email == '') { $errors['email'] = "Email is Required!"; }

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
$ip = getClientIP();
    try
    {
        
        $sql = "INSERT INTO first_step_inquiries (user_id, name, phone, email, created_date, ip) 
        VALUES (:user_id, :name, :phone, :email, now(), :ip)";
        $stmt = $db_con->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':ip', $ip, PDO::PARAM_STR);  
        $inserted = $stmt->execute();
        
        if($inserted)
        {
            $status = 'success';
            $msg = 'Submitted Successfully!';
            exit(json_encode(array('status'=>$status,'msg'=>$msg)));
        }
        else
        {
            $status = 'error';
            $msg = 'Not Submitted!';
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