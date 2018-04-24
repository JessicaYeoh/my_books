<?php
  session_start();
  header('Content-Type: application/json');
  include '../model/db.php';
  include '../model/db_functions.php';
?>

<?php
// processing to delete a book
if(isset($_GET['BookID']) && $_GET['action_type'] == 'delete') {
  if(delete_product($_GET['BookID'])) {
    echo json_encode(Array('userDelete'=>true));
  } else {
    echo json_encode(Array('userDelete'=>false));
  }
exit();
}


?>
