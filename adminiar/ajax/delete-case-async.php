<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
$id = $_POST['id'];
try
{
  $sql = "DELETE FROM leads WHERE lead_id=:id AND user_id=:user_id";
  $stmt = $db_con->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
  $deleted = $stmt->execute();
  if($deleted)
  {
    $status = 'success';
    $msg = 'Deleted Successfully!';
    exit(json_encode(array('status'=>$status,'msg'=>$msg)));
  }
  else
  {
    $status = 'error';
    $msg = 'Not Deleted!';
    exit(json_encode(array('status'=>$status,'msg'=>$msg)));
  }
}
catch(PDOException $e)
{
echo $e->getMessage();
}
}
else
{
  show_404();
}
?>