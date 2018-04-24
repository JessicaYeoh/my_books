<?php
  session_start();
//  if we destroy the session, then we lose session_id() hashing for the user's browser,
//  instead we'll unset all user-related $_SESSION values;


  unset($_SESSION['error']);
  unset($_SESSION['login']);
  unset($_SESSION['username']);
  unset($_SESSION['userID']);
  unset($_SESSION['role']);
  unset($_SESSION['message']);
  unset($_SESSION['firstname']);

  unset($_SESSION['updated']);
  unset($_SESSION['bookID']);
  unset($_SESSION['file_msg']);
  unset($_SESSION['imagename']);

  header('Location: http://localhost/mybooks/index.php');

?>
