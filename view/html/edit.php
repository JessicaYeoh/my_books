<?php
session_start();
include '../../model/db.php';
include '../../model/db_functions.php';
include 'head.php';
// include 'nav.php';



$bookID = $_GET['BookID'];

$updateBooks = getBooks($bookID);

$authorName = $updateBooks['Name'];
$authorSurname = $updateBooks['Surname'];
$bookTitle = $updateBooks['BookTitle'];
$yearOfPublication = $updateBooks['YearofPublication'];
$millionsSold = $updateBooks['MillionsSold'];
?>

<!-- <form method="post" action="../../controller/edit_process.php?BookID=
//
" id="update_form" onsubmit="updateBook()"> -->

<form id="update_form">
    <div class="book_update">

      <div class="form-group">
        <label for="author_name">Author First Name</label>
        <input id="author_name" type="text" class="form-control" name="author_name" value="<?php echo $authorName; ?>" required autofocus>
      </div>

      <div class="form-group">
        <label for="author_surname">Author Surname</label>
        <input id="author_surname" type="text" class="form-control" name="author_surname" value="<?php echo $authorSurname; ?>" required autofocus>
      </div>

      <div class="form-group">
        <label for="book_title">Book Title</label>
        <input id="book_title" type="text" class="form-control" name="book_title" value="<?php echo $bookTitle; ?>" required autofocus>
      </div>

      <div class="form-group">
        <label for="year">Year of Publication</label>
        <input id="year" type="text" class="form-control" name="year" value="<?php echo $yearOfPublication; ?>" required autofocus>
      </div>

      <div class="form-group">
        <label for="sold">Millions Sold</label>
        <input id="sold" type="text" class="form-control" name="sold" value="<?php echo $millionsSold; ?>" required autofocus>
      </div>

      <input type="button" value="Update" onclick="showMsg(<?php echo $bookID; ?>)" />

      <div id="message"></div>

    </div>
</form>
