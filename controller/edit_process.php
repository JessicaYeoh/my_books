<?php
  session_start();
  header('Content-Type: application/json');
  include '../model/db.php';
  include '../model/db_functions.php';
?>

<?php

if(isset($_GET['BookID'])) {
    $result = getBooks($_GET['BookID']);
    if(is_array($result)) {
      echo json_encode($result);
    } else {
      echo json_encode(Array('userdata'=>false));
    }
}

if(isset($_POST)) {
  if(updateBook($_POST, $_GET['BookID'])) {
    // if(updateBook($_POST, $_GET['bid'])) {
    return true;
  } else {
    return false;
  }
  exit();
}



?>
