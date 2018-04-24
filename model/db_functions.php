<?php
// INSERT DATA FUNCTION
function insertData($table, $data){
	GLOBAL $conn;
     if(!empty($data) && is_array($data)){
        $columns = '';
        $values  = '';
	      $columnString = implode(',', array_keys($data));
        $valueString = ":".implode(',:', array_keys($data));

			  $sql = "INSERT INTO ".$table." (".$columnString.") VALUES (".$valueString.")";
        $query = $conn->prepare($sql);

			  print_r($data);

        foreach($data as $key=>$val){
            $query->bindValue(':'.$key, $val);
        }
          $insert = $query->execute();
    }
	   return $insert;
}

function getAll(){
	GLOBAL $conn;
	$showBooks = "SELECT * FROM book inner join author on book.authorID = author.authorID";
	$stmt = $conn->prepare($showBooks);
	$stmt->execute();
	return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getBooks($book_ID){
  GLOBAL $conn;
  $updateBooks = "SELECT * FROM book inner join author on book.authorID = author.authorID WHERE BookID = :bid;";
  $stmt = $conn->prepare($updateBooks);
  $stmt->bindParam(':bid', $book_ID, PDO::PARAM_INT);
  $stmt->execute();
  return $result = $stmt->fetch(PDO::FETCH_ASSOC);
};

// function updateBook($postdata, $book_ID) {
//   GLOBAL $conn;
//   $contentquery = "UPDATE book
// 	inner join author on book.authorID = author.authorID
// 	inner join bookranking on book.BookID = bookranking.BookID
// 	inner join bookplot on book.BookID = bookplot.BookID
// 	inner join book_update on book.BookID = book_update.BookID
// 	SET Name = :name, Surname = :surname, BookTitle = :booktitle, YearofPublication = :year, MillionsSold = :sold, dateUpdated = SYSDATE()
// 	WHERE book.BookID = :bid;";
//   $stmt = $conn->prepare($contentquery);
//   $stmt->bindParam(':name', test_user_input($postdata['author_name']), PDO::PARAM_STR);
//   $stmt->bindParam(':surname', test_user_input($postdata['author_surname']), PDO::PARAM_STR);
//   $stmt->bindParam(':booktitle', test_user_input($postdata['book_title']), PDO::PARAM_STR);
//   $stmt->bindParam(':year', test_user_input($postdata['year']), PDO::PARAM_STR);
//   $stmt->bindParam(':sold', test_user_input($postdata['sold']), PDO::PARAM_STR);
//   $stmt->bindParam(':bid', test_user_input($book_ID), PDO::PARAM_INT);
//   $stmt->execute();
//   if($stmt->rowCount() > 0) {
//     return true;
//   } else {
//     return false;
//   }
// }

function delete_product($book_ID) {
    GLOBAL $conn;

		$sql = "DELETE FROM book WHERE BookID = ' " . $_GET['BookID'] . " '";
		$statement = $conn->prepare($sql);
		$result = $statement->execute();
		$statement->closeCursor();
    return $result;
	}


//sanitise data sent via POST and SEND
// cleans out the input value
function test_user_input($data) {
	GLOBAL $conn;
	$data = trim($data);
	$data= stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
