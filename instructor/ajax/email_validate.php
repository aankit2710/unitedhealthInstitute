<?php
require_once('config/functions.php');
require_once('config/db.php');
// check if email is already taken
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email_check']) && $_POST['email_check'] == 1) {
// validate email
$email = mysqli_real_escape_string($conn, $_POST['email']);
$sqlcheck = "SELECT email_address FROM instructors WHERE email_address = '$email' ";
$checkResult = mysqli_query($conn,$sqlcheck);
// check if email already taken
if(mysqli_num_rows($checkResult) > 0) {
echo "Sorry! email has already taken. Please try another.";
}
}
?>