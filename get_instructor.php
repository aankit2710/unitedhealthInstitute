<?php  
include_once("adminiar/includes/config/db.php"); 
$category_details = explode("+",$_GET['courseId']);
$sql = "SELECT prefix,first_name,last_name,instructors.instructor_id FROM added_courses inner join instructors on added_courses.instructor_id = instructors.instructor_id WHERE added_courses.program_id  = '$category_details[0]'"; 
$result = mysqli_query($conn,$sql);
$json = [];
while($row = mysqli_fetch_assoc($result)){
$name = $row['prefix'].' '.$row['first_name'].' '.$row['last_name'];
$json[$row['instructor_id']] = $name;
}
echo json_encode($json);
?> 