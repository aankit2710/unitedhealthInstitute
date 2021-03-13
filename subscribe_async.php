<?php
require_once('adminiar/includes/config/functions.php');
require_once('adminiar/includes/config/db_config.php');
if(is_ajax_request())
{
$user_id  = 1;
$email = sanitize_input($_POST['sub_email']);

$errors=array();
if ($email == '') { $errors['sub_email'] = "Email is Required!"; }

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
        $sql = "INSERT INTO subscribe_inquiries (user_id, email, created_date, ip) 
        VALUES (:user_id, :email, now(), :ip)";
        $stmt = $db_con->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
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