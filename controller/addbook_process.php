<?php
session_start();
include '../model/db.php';
include '../model/db_functions.php';


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	//input sanitation
	$bookName = !empty($_POST['book_name'])? test_user_input(($_POST['book_name'])): null;
  $bookTitle = !empty($_POST['book_title'])? test_user_input(($_POST['book_title'])): null;
  $bookYear = !empty($_POST['book_year'])? test_user_input(($_POST['book_year'])): null;
  $bookLang = !empty($_POST['book_lang'])? test_user_input(($_POST['book_lang'])): null;
  $bookSold = !empty($_POST['book_sold'])? test_user_input(($_POST['book_sold'])): null;

	try{
		if($_REQUEST['action_type'] == 'add'){
        $data = //set the variable $data within the insertData($table,$data) function to the following array
        array(
            'BookTitle' => $bookName,
            'OriginalTitle' => $bookTitle,
            'YearofPublication' => $bookYear,
            'LanguageWritten' => $bookLang,
            'MillionsSold' => $bookSold,
            );
		$table="book"; //table name in DB to insert data into
		//function call from db_functions.php
		insertData($table,$data);
		header('location: ../view/html/loggedin_page.php'); //where to redirect when registration is successful
		}
	}
		catch(PDOException $e)
		{
			echo "Error: ".$e -> getMessage();
			die();
		}
}

?>
