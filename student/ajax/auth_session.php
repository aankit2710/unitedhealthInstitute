<?php
session_start();
$student_id = trim($_SESSION['student_id']);
$payment_completed = trim($_SESSION['payment_completed']);
if(empty($student_id))
{
	header("location:../login.php");
}

include_once("config/db.php");

$student_id = $_SESSION['student_id'];
$fetch1 = mysqli_query($conn,"SELECT * FROM students WHERE student_id='".$student_id."' AND payment_completed='".$payment_completed."'");
$num1 = mysqli_num_rows($fetch1);
while($show1 = mysqli_fetch_assoc($fetch1))
{
$first_name=$show1['first_name'];
$last_name=$show1['last_name'];
$telephone_number=$show1['telephone_number'];
$email_address=$show1['email_address'];
$address=$show1['address'];
$profile_pic = $show1['profile_pic'];
$payment_completed = $show1['payment_completed'];
}
?>