<?php  
include_once("adminiar/includes/config/db.php"); 
 if(isset($_POST["price"]))  
 {  
      $output = array();  
      $query = "SELECT price, time_period, pricing_id FROM pricing WHERE service_id = ".$_POST['price']."";  
      $result = mysqli_query($conn, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output = array(
                    'price' => '<h4>Course Price - '.$row["price"].' - For '.$row["time_period"].' Days</h4>',
                    'pricing_id' => $row['pricing_id'],
                );
           }
      }  
      else  
      {
           $output = array(
                'price' => 'No Price Found',
                'pricing_id' => '',
            );
      }
      //header('Content-Type: application/json');
      echo json_encode($output);
      exit;
 }  
 ?> 