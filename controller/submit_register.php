<?php
session_start();
include '../model/db.php';
include '../model/db_functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") //if the form values has been posted
{
	//input sanitation
	$username = !empty($_POST['username'])? test_user_input(($_POST['username'])): null; //if the POST username is not empty then(?) get the value and complete the try section, else(:) set the value to null
	$password2 = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;

	// PASSWORD_HASH
	$password= password_hash($password2, PASSWORD_DEFAULT);

	$firstname = !empty($_POST['firstName'])? test_user_input(($_POST['firstName'])): null;
	$surname = !empty($_POST['surname'])? test_user_input(($_POST['surname'])): null;
	$userrole = !empty($_POST['userRole'])? test_user_input(($_POST['userRole'])): null;

	try
	{
		// if(isset($_POST['register_submit'])){    //this will run the action on form submit name
		if($_REQUEST['action_type'] == 'add'){ //if the action type is add
        $data = //set the variable $data within the insertData($table,$data) function to the following array
        array(
            'username' => $username,
            'password' => $password,
            );
				$table="login"; //table name in DB to insert data into
				//function call from db_functions.php
				insertData($table,$data);

				$loginID = $conn->lastinsertid();

				$data =
				array(
						'firstName' => $firstname,
						'surname' => $surname,
						'userRole' => $userrole,
						'LogInID' => $loginID
						);
				$table="users";
				insertData($table,$data);


				$_SESSION['message'] = "User added successfully!";

				header('location: ../view/html/register.php'); //where to redirect when registration is successful
		}
	}
	catch(PDOException $e)
	{
		echo "Error: ".$e -> getMessage();
		die();
	}
}

?>
