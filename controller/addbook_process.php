<?php
session_start();
include '../model/db.php';
include '../model/db_functions.php';


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	//input sanitation AUTHOR table
	$authName = !empty($_POST['author_name'])? test_user_input(($_POST['author_name'])): null;
	$authSurname = !empty($_POST['author_surname'])? test_user_input(($_POST['author_surname'])): null;
	$authNation = !empty($_POST['author_nationality'])? test_user_input(($_POST['author_nationality'])): null;
	$birthYr = !empty($_POST['author_byear'])? test_user_input(($_POST['author_byear'])): null;
	$deathYr = !empty($_POST['author_dyear'])? test_user_input(($_POST['author_dyear'])): null;

	//input sanitation BOOK table
	$bookName = !empty($_POST['book_name'])? test_user_input(($_POST['book_name'])): null;
  $bookTitle = !empty($_POST['book_title'])? test_user_input(($_POST['book_title'])): null;
  $bookYear = !empty($_POST['book_year'])? test_user_input(($_POST['book_year'])): null;
	$bookGenre = !empty($_POST['genre'])? test_user_input(($_POST['genre'])): null;
  $bookLang = !empty($_POST['book_lang'])? test_user_input(($_POST['book_lang'])): null;
  $bookSold = !empty($_POST['book_sold'])? test_user_input(($_POST['book_sold'])): null;

	//input sanitation PLOT table
	$plot = !empty($_POST['plot'])? test_user_input(($_POST['plot'])): null;
	$plotSource = !empty($_POST['plotSource'])? test_user_input(($_POST['plotSource'])): null;

	//input sanitation RANKING table
	$ranking = !empty($_POST['ranking'])? test_user_input(($_POST['ranking'])): null;


	try{
		if($_REQUEST['action_type'] == 'add'){

// Ensure no duplicate authors added
		$author = "SELECT * FROM author WHERE Name = '$authName' AND Surname = '$authSurname'";
    $stmt = $conn->prepare($author);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $author_count = $stmt->rowCount();


				if($author_count > 0) {
					$authorID = $result['AuthorID'];

				} else{
				// insert data array into AUTHOR table
				  $data = //set the variable $data within the insertData($table,$data) function to the following array
					  array(
							'Name' => $authName,
							'Surname' => $authSurname,
							'Nationality' => $authNation,
							'BirthYear' => $birthYr,
							'DeathYear' => $deathYr
					    );
						$table="author"; //table name in DB to insert data into
						//function call from db_functions.php
						insertData($table,$data);
					// get the last inserted ID in the author table
					$authorID = $conn->lastinsertid();
				}

				if (($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "")) {

				$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
				$folderPath = "../view/images/".$_FILES['file']['name']; // Target path where file is to be stored
				$targetPath = "../images/".$_FILES['file']['name']; // Target path where file is to be stored

				//Move uploaded File
				move_uploaded_file($sourcePath,$folderPath) ; // Moving Uploaded file

							// insert data array into BOOK table
									$data = array(
										'BookTitle' => $bookName,
										'OriginalTitle' => $bookTitle,
										'YearofPublication' => $bookYear,
										'Genre' => $bookGenre,
										'LanguageWritten' => $bookLang,
										'MillionsSold' => $bookSold,
										'imageURL' => $targetPath,
										'AuthorID' => $authorID
									);

									$table="book";

									insertData($table,$data);

									// get the last inserted ID in the book table
									$bookID = $conn->lastinsertid();

					}else{
							$_SESSION['message'] = "Incorrect file type!";
							header('location: ../view/html/add_newbook.php');
					}


// insert data array into BOOKPLOT table
		$data = array(
			'Plot' => $plot,
			'PlotSource' => $plotSource,
			'BookID' => $bookID
		);

		$table="bookplot";

		insertData($table,$data);

// insert data array into BOOKRANKING table
		$data = array(
			'RankingScore' => $ranking,
			'BookID' => $bookID
		);

		$table="bookranking";

		insertData($table,$data);


// Which user updated the book
		$user = $_SESSION["username"];

		$stmt = $conn->prepare("select usersID from users where LogInID = (select LogInID from login where username = :user)");
		$stmt->bindParam(':user', $user);
		$stmt->execute();
		$rows = $stmt->fetch();

				if(isset($user)){
				  $userID = $rows['usersID'];

				  date_default_timezone_set("Australia/Brisbane");

					$data = array(
						'dateUpdated' => date("d-m-Y h:i:sa"),
					  'usersID' => $userID,
						'BookID' => $bookID
					);

					$table="book_update";

					insertData($table,$data);
				}


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
