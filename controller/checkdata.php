<?php
session_start();
// header('Content-Type: application/json');

include '../model/db.php';
include '../model/db_functions.php';

if(isset($_POST['user_name']))
{
    $username=$_POST['user_name'];

    $checkdata=" SELECT username FROM login WHERE username='$username' ";
    GLOBAL $conn;
    
    $stmt = $conn->prepare($checkdata);
    $stmt->execute();
    $result = $stmt->fetch();

 if($result>0)
 {
  echo "Email Already Exists!";
  // echo json_encode(Array('userExists'=>false));
  // echo json_encode($result);
 }
 else
 {
  echo "";
  // echo json_encode(Array('userExists'=>true));
 }
 exit();
}
?>
