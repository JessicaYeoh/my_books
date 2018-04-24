<?php
  session_start();
  // header('Content-Type: application/json');
  include '../model/db.php';
  include '../model/db_functions.php';
?>

<?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") //if the form values has been posted
  {
    $authorName = !empty($_POST['author_name'])? test_user_input($_POST['author_name']): null;
    $authorSur = !empty($_POST['author_surname'])? test_user_input($_POST['author_surname']): null;
    $book_title = !empty($_POST['book_title'])? test_user_input($_POST['book_title']): null;
    $year = !empty($_POST['year'])? test_user_input($_POST['year']): null;
    $sold = !empty($_POST['sold'])? test_user_input($_POST['sold']): null;
    $bookID = !empty($_GET['BookID'])? test_user_input($_GET['BookID']): null;

  	try
  	{
  		if($_REQUEST['action_type'] == 'update'){

          $contentquery = "UPDATE book
          inner join author on book.authorID = author.authorID
          inner join bookranking on book.BookID = bookranking.BookID
          inner join bookplot on book.BookID = bookplot.BookID
          inner join book_update on book.BookID = book_update.BookID
          SET Name = :name, Surname = :surname, BookTitle = :booktitle, YearofPublication = :year, MillionsSold = :sold, dateUpdated = SYSDATE()
          WHERE book.BookID = :bid;";
          $stmt = $conn->prepare($contentquery);

          $stmt->bindParam(':name', $authorName, PDO::PARAM_STR);
          $stmt->bindParam(':surname', $authorSur, PDO::PARAM_STR);
          $stmt->bindParam(':booktitle', $book_title, PDO::PARAM_STR);
          $stmt->bindParam(':year', $year, PDO::PARAM_STR);
          $stmt->bindParam(':sold', $sold, PDO::PARAM_STR);
          $stmt->bindParam(':bid', $bookID, PDO::PARAM_INT);
          $stmt->execute();

  				$_SESSION['message'] = "Book updated successfully!";

          //where to redirect when edit is successful
  				header('location: http://localhost/mybooks/view/html/edit.php?BookID='.$_GET['BookID'].'');

  		}
  	}
  	catch(PDOException $e)
  	{
  		echo "Error: ".$e -> getMessage();
  		die();
  	}
  }
?>
