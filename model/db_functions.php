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

function selectData($table, $conditions = array()){
	GLOBAL $conn;
    $sql = 'SELECT ';
    $sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
    $sql .= ' FROM '.$table;
  if(array_key_exists("where",$conditions)){
        $sql .= ' WHERE ';
        $i = 0;
        foreach($conditions['where'] as $key => $value){
            $pre = ($i > 0)?' AND ':'';
            $sql .= $pre.$key." = '".$value."'";
            $i++;
        }
    }
    $query = $conn->prepare($sql);
    $data= $query->execute();
    if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){
        switch($conditions['return_type']){
            case 'count':
                $data = $query->rowCount();
                break;
            case 'single':
                $data = $query->fetch(PDO::FETCH_ASSOC);
                break;
            default:
                $data = '';
            }
    }
    else
    {
        if($query->rowCount() > 0){
            $data = $query->fetchAll();
        }
        return $data;
    }
    return $data;
}

function getBooks($book_ID){
  GLOBAL $conn;
  $updateBooks = "SELECT * FROM book inner join author on book.authorID = author.authorID WHERE BookID = :bid;";
  $stmt = $conn->prepare($updateBooks);
  $stmt->bindParam(':bid', $book_ID, PDO::PARAM_INT);
  $stmt->execute();
  return $result = $stmt->fetch(PDO::FETCH_ASSOC);
};

function updateBook($postdata, $book_ID) {
  GLOBAL $conn;
  $contentquery = "UPDATE book inner join author on book.authorID = author.authorID SET Name = :name, Surname = :surname, BookTitle = :booktitle, YearofPublication = :year, MillionsSold = :sold WHERE BookID = :bid;";
  $stmt = $conn->prepare($contentquery);
  $stmt->bindParam(':name', test_user_input($postdata['author_name']), PDO::PARAM_STR);
  $stmt->bindParam(':surname', test_user_input($postdata['author_surname']), PDO::PARAM_STR);
  $stmt->bindParam(':booktitle', test_user_input($postdata['book_title']), PDO::PARAM_STR);
  $stmt->bindParam(':year', test_user_input($postdata['year']), PDO::PARAM_STR);
  $stmt->bindParam(':sold', test_user_input($postdata['sold']), PDO::PARAM_STR);
  $stmt->bindParam(':bid', test_user_input($book_ID), PDO::PARAM_INT);
  $stmt->execute();
  if($stmt->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}

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
