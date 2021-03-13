<?php

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = false;

// Database settings. Change these for your database configuration.
$dbConfig = [
	'host' => 'localhost',
	'username' => 'jean_institute',
	'password' => 'e+od_1=]3Q@g',
	'name' => 'jean_institute'
];

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
	'email' => 'vacationwebowners@gmail.com',
	'return_url' => 'http://nibbanah.com/unitedhealthinstitute/payment-successful.php',
	'cancel_url' => 'http://nibbanah.com/unitedhealthinstitute/payment-cancelled.php',
	'notify_url' => 'http://nibbanah.com/unitedhealthinstitute/pricing/payments.php'
];

// Create a connection to the database.
$db = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['name']);
	
$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

// Product being purchased.
$itemName = $_POST['item_number'];
$itemName = $_POST['item_name'];
$pricing = $_POST['checkprice'];

$results = $db->query('SELECT price FROM `pricing` WHERE pricing_id = \'' . $pricing . '\'');
$row_cnt = $results->num_rows;
while ($obj = $results->fetch_object()) {
    $itemAmount = $obj->price;
}

$results = $db->query('SELECT max(student_id) as student_id FROM `students`');
$row_cnt = $results->num_rows;
while ($obj = $results->fetch_object()) {
    $student_id = $obj->student_id;
}

$results = $db->query('SELECT instructor_id FROM `students` where student_id = \'' . $student_id . '\' ');
$row_cnt = $results->num_rows;
while ($obj = $results->fetch_object()) {
    $instructor_id = $obj->instructor_id;
}

$results = $db->query('SELECT * FROM `instructors` where instructor_id = \'' . $instructor_id . '\' ');
$row_cnt = $results->num_rows;
while ($obj = $results->fetch_object()) {
    $email_address = $obj->email_address;
    $prefix = $obj->prefix;
    $first_name = $obj->first_name;
    $last_name = $obj->last_name;
}

// Include Functions
require 'functions.php';

// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {

	// Grab the post data so that we can set up the query string for PayPal.
	// Ideally we'd use a whitelist here to check nothing is being injected into
	// our post data.
	$data = [];
	foreach ($_POST as $key => $value) {
		$data[$key] = stripslashes($value);
	}

	// Set the PayPal account.
	$data['business'] = $paypalConfig['email'];

	// Set the PayPal return addresses.
	$data['return'] = stripslashes($paypalConfig['return_url']);
	$data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
	$data['notify_url'] = stripslashes($paypalConfig['notify_url']);

	// Set the details about the product being purchased, including the amount
	// and currency so that these aren't overridden by the form data.
	$data['item_name'] = $itemName;
	$data['amount'] = $itemAmount;
	$data['currency_code'] = 'USD';

	// Add any custom fields for the query string.
	//$data['custom'] = USERID;

	// Build the query string from the data.
	$queryString = http_build_query($data);

	// Redirect to paypal IPN
	header('location:' . $paypalUrl . '?' . $queryString);
	exit();

} else {
	// Handle the PayPal response.

	// Assign posted variables to local data array.
	$data = [
		'item_name' => $_POST['item_name'],
		'item_number' => $_POST['item_number'],
		'payment_status' => $_POST['payment_status'],
		'payment_amount' => $_POST['mc_gross'],
		'payment_currency' => $_POST['mc_currency'],
		'txn_id' => $_POST['txn_id'],
		'receiver_email' => $_POST['receiver_email'],
		'payer_email' => $_POST['payer_email'],
		'custom' => $_POST['custom'],
	];

	// We need to verify the transaction comes from PayPal and check we've not
	// already processed the transaction before adding the payment to our
	// database.
	if (verifyTransaction($_POST) && checkTxnid($data['txn_id'])) {
		if (addPayment($data,$student_id) !== false) {
			// Payment successfully added.
			require("../mail_data/class.phpmailer.php");
            $mail = new PHPMailer();
            $mail->IsSMTP();
$mail->Host = "localhost";
$mail->SMTPAuth = false;
$mail->SMTPSecure = "false";
$mail->Port = 25;
$mail->Username = "enquiry@nibbanah.com";
$mail->Password = "lc)fYqqE7w8*";
$mail->From = "enquiry@nibbanah.com";
$mail->FromName = "You have Inquiry from Student Registration - The Details are given below:";
$mail->AddAddress($email_address);
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
<div style='max-width: 800px; margin: 0; padding: 30px 0;'>
<table width='80%' border='0' cellpadding='0' cellspacing='0'>
<tr>
<td width='5%'></td>
<td align='left' width='95%' style='font: 13px/18px Arial, Helvetica, sans-serif;'>
<h2 style='font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;'>Hello $prefix.' '.$first_name.' '$last_name,</h2>
One Student Enrolled in a course added by you.<br />
<br />
<br />
We’re here to answer any questions you might have regarding your request. Please e-mail us.
</td>
</tr>
</table>
</div>
</body>
</html>";

$mail->MsgHTML($message);
            if(!$mail->Send())
            {
                $status = 'error';
                $msg = 'Problem Sending Mail!';
                exit(json_encode(array('status'=>$status,'msg'=>$msg)));
            }
            else
            {
                $status = 'success';
                $msg = 'Mail Sent Successfully!';
                exit(json_encode(array('status'=>$status,'msg'=>$msg)));
            }
            
		}
	}
}