<?php
  session_start();
  require_once('../model/db_functions.php');
  require_once("../model/db.php");

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  	$username = !empty($_POST['username2'])? test_user_input(($_POST['username2'])): null;
  	$password = !empty($_POST['password2'])? test_user_input(($_POST['password2'])): null;
    try{
      $stmt = $conn->prepare("SELECT * FROM login INNER JOIN users ON login.LogInID = users.LogInID WHERE username=:user");
      $stmt->bindParam(':user', $username);
      $stmt->execute();
      $rows = $stmt->fetch();
        if (password_verify($password, $rows['password'])){
          $_SESSION["username"] = $username;
          $_SESSION['firstname'] = $rows['firstName'];
          $_SESSION["login"] = true;
          $_SESSION["userID"] = $rows['usersID'];
          $_SESSION["role"] = $rows['userRole'];
          header('location: ../view/html/loggedin_page.php');
        } else {
          $_SESSION['error'] = "Incorrect username or password!";
          header('location: ../index.php');
        }
    }
    catch(PDOException $e) {
      echo "Account creation problems".$e -> getMessage();
      die();
    }
  }
?>
