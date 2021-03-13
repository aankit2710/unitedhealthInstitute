<?php
session_start();
require_once('config/functions.php');
require_once('config/db_config.php');
if(isset($_POST['btn-login']))
{
	function test_input($data){
		$data = trim($data);
		$data = addslashes($data);
		return $data;
	}
	//$user_name = $_POST['user_name'];
	$user_email = test_input($_POST['user_email']);
	$user_password = test_input($_POST['password']);
	$password = md5($user_password);
	try
	{
		
		$stmt = $db_con->prepare("SELECT * FROM instructors WHERE email_address=:email");
		$stmt->execute(array(":email"=>$user_email));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$count = $stmt->rowCount();

		if($row['password']==$password)
		{
		  if($row['is_verified'] == 1)
		  {  
			echo "ok"; // log in
			$_SESSION['status'] = $row['status'];
			$_SESSION['instructor_id'] = $row['instructor_id'];
			$_SESSION['is_verified'] = $row['is_verified'];
		  }
		  else
		  {
		      echo "not verified";
		  }
		}
		else
		{
			echo "Email or password does not exist."; // wrong details
		}

	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
}
?>