<?php
session_start();
$instructor_id = trim($_SESSION['instructor_id']);
$is_verified = trim($_SESSION['is_verified']);
if(empty($instructor_id))
{
	header("location:../instructor-login.php");
}

include_once("config/db.php");

$instructor_id = $_SESSION['instructor_id'];
$fetch1 = mysqli_query($conn,"SELECT * FROM instructors WHERE instructor_id='".$instructor_id."' AND is_verified='".$is_verified."'");
$num1 = mysqli_num_rows($fetch1);
while($show1 = mysqli_fetch_assoc($fetch1))
{
$prefix=$show1['prefix'];
$first_name=$show1['first_name'];
$last_name=$show1['last_name'];
$telephone_number=$show1['telephone_number'];
$email_address=$show1['email_address'];
$address=$show1['address'];
$education_levels=$show1['education_levels'];
$area_of_expertise=$show1['area_of_expertise'];
$resume=$show1['resume'];
$profile_pic = $show1['profile_pic'];
$is_verified = $show1['is_verified'];
$experience = $show1['experience'];
$languages = $show1['languages'];
$introduction = $show1['introduction'];
}
?>