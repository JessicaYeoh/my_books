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

// var1 = lastinsertid();
//
// 		$data = array(
//
// 		)

		header('location:../view/html/loggedin_page.php'); //where to redirect when registration is successful
		}
	}
		catch(PDOException $e)
		{
			echo "Error: ".$e -> getMessage();
			die();
		}
}

?>
