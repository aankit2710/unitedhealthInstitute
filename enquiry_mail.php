<?php
include_once("adminiar/includes/config/db.php");
require("mail_data/class.phpmailer.php");
$mail = new PHPMailer();

// function cleanData($str) {
//     $str = htmlspecialchars($str);
//     $str = filter_var($str, FILTER_SANITIZE_STRING);
//     $str = filter_var($str, FILTER_SANITIZE_SPECIAL_CHARS);
//     return $str;
// }
// print_r($_POST);
// echo $input = cleanData($_POST['content']);
// var_dump($input);

$mail->IsSMTP();
$mail->Host = "localhost";
$mail->SMTPAuth = false;
$mail->SMTPSecure = "false";
$mail->Port = 25;
$mail->Username = "enquiry@nibbanah.com";
$mail->Password = "&lc;fqLs--k9";
$mail->From = "enquiry@nibbanah.com";
$mail->FromName = "You have Inquiry from Contact Us - The Details are given below:";
$mail->AddAddress("info@unitedhealthagency.com");
//$mail->addCC("lannyhutchison@gmail.com");
//$mail->addBCC("websitesinquiry@gmail.com");
//$mail->AddReplyTo("mail@mail.com");
$mail->IsHTML(true);
$mail->Subject = "You have Inquiry from Contact Us - The Details are given below:";

$message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Inquiry from Contact Us</title>
<style type='text/css'>
body{
color:#000;
font-family:Arial, Helvetica, sans-serif;
font-size:12px;
margin:5px;
}
</style>
</head>
<body>
<table width='700' border='0' cellspacing='0' cellpadding='4'>
<tr>
<th align='left' scope='row'>&nbsp;</th>
<td align='left'>&nbsp;</td>
</tr>
<tr>
<th width='138' align='left' valign='top' scope='row'>Name</th>
<td align='left' valign='top'>:  ".$_POST['userName']."</td>
</tr>
<tr>
<th width='138' align='left' valign='top' scope='row'>Subject</th>
<td align='left' valign='top'>: ".$_POST['userSubject']."</td>
</tr>
<tr>
<th width='138' align='left' valign='top' scope='row'>Email Address</th>
<td align='left' valign='top'>: ".$_POST['userEmail']."</td>
</tr>
<tr>
<th width='138' align='left' valign='top' scope='row'>Contact Number</th>
<td align='left' valign='top'>: ".$_POST['userPhone']."</td>
</tr>
<tr>
<th width='138' align='left' valign='top' scope='row'>Message</th>
<td align='left' valign='top'>: ".$_POST['content']."</td>
</tr>
</table>
</body>
</html>";

if(!empty($_POST))
{
$query = "insert into contact_inquiries(user_id,person_name,person_email,person_phone,inquiry_subject,inquiry_msg,created_date,ip) values('".$_POST['user_id']."','".$_POST['userName']."','".$_POST['userEmail']."','".$_POST['userPhone']."','".$_POST['userSubject']."','".$_POST['content']."',now(),'".$_SERVER['REMOTE_ADDR']."')";
$insert = mysqli_query($conn,$query);
$last_id = mysqli_insert_id($conn);
}

$mail->MsgHTML($message);
if(!$mail->Send()){
echo "<p class='Error' style='margin-bottom: 20px;padding: 10px;color: #fff;background: red;text-align: center;'>Problem in Sending Mail.</p>";
} else
{
$query = "UPDATE contact_inquiries SET email_sent = 0, modified_date = now() where inquiry_id = '".$last_id."' AND user_id = '".$_POST['user_id']."'";
$update = mysqli_query($conn,$query);
if($update){
echo "<p class='success' style='margin-bottom: 20px;padding: 10px;color: #fff;background: green;text-align: center;'>Inquiry Sent Successfully.</p>";
}
}
?>