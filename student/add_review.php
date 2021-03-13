<?php

echo $c_name = $_POST['c_name'];
echo $heading = $_POST['heading'];
echo $c_review = $_POST['c_review'];
echo $score = $_POST['score'];

$imgfile=$_FILES["profile_pic"]["name"];

$target_dir = '../uploads/reviews/';
echo $sql = "INSERT INTO reviews_detail (user_id, c_name, heading, c_review, rating, ip, created_date, review_image) VALUES ($user_id, $c_name, $heading, $c_review, $rating, $ip, now(), $review_image)";
if (!file_exists($target_dir))
{
mkdir($target_dir, 0777, true);
}

$ip = getClientIP();
 $sql = "INSERT INTO reviews_detail (user_id, c_name, heading, c_review, rating, ip, created_date, review_image) VALUES ($user_id, $c_name, $heading, $c_review, $rating, $ip, now(), $review_image)";
   $insert = mysqli_query($conn,$sql);
   
   echo $sql;
	if($insert)
		{
			
			echo "<script>alert('Inserted Successfully.');</script>";
			?>
			<script>
			window.location = 'review.php';
            </script>
            <?php
		}

  ?>