<?php
session_start();
if(!$_SESSION['login']){
  header("location: ../../index.php");
  die;
}

include '../../model/db.php';
include '../../model/db_functions.php';
include 'head.php';
include 'header.php';
include 'nav.php';

$bookID = $_GET['BookID'];

$updateBooks = getBooks($bookID);

$authorName = $updateBooks['Name'];
$authorSurname = $updateBooks['Surname'];
$bookTitle = $updateBooks['BookTitle'];
$yearOfPublication = $updateBooks['YearofPublication'];
$millionsSold = $updateBooks['MillionsSold'];
?>

<form id="update_form" method="POST" action="../../controller/update_processing.php?BookID=<?php echo $bookID;?>">

<h1> Edit book</h1>

<div id="update_msg">
  <p>
    <?php
    if(!isset($_SESSION['message'])){
      $_SESSION['message'] = "";
    }else{
    echo $_SESSION['message'];
    unset ($_SESSION['message']);
    }
    ?>
  </p>
</div>


      <div class="form-group">
        <label for="author_name">Author First Name</label>
        <input id="author_name" type="text" class="form-control" name="author_name" value="<?php echo $authorName; ?>" required autofocus pattern="^\p{Lu}\p{L}+(?:[\s,.'-]\p{L}+)?$" oninvalid="setCustomValidity('Incorrect format! First letter must be uppercase.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="author_surname">Author Surname</label>
        <input id="author_surname" type="text" class="form-control" name="author_surname" value="<?php echo $authorSurname; ?>" required autofocus pattern="^\p{Lu}\p{L}+(?:[\s,.'-]\p{L}+)?$" oninvalid="setCustomValidity('Incorrect format! First letter must be uppercase.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="book_title">Book Title</label>
        <input id="book_title" type="text" class="form-control" name="book_title" value="<?php echo $bookTitle; ?>" required autofocus pattern="^[A-Z][a-zA-Z0-9-_\. ]{1,100}$" oninvalid="setCustomValidity('Incorrect format! First letter must be uppercase.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="year">Year of Publication</label>
        <input id="year" type="text" class="form-control" name="year" value="<?php echo $yearOfPublication; ?>" required autofocus pattern="[0-9]{4}" oninvalid="setCustomValidity('Please enter 4 numbers as a year')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="sold">Millions Sold</label>
        <input id="sold" type="text" class="form-control" name="sold" value="<?php echo $millionsSold; ?>" required autofocus pattern="[0-9]{1,3}" oninvalid="setCustomValidity('Invalid format')" oninput="setCustomValidity('')">
      </div>

      <input type="hidden" name="action_type" value="update"/>

      <input type="submit" value="Update" id="edit_button" class="btn btn-primary btn-block" name="Update"/>

      <div id="message"></div>


</form>

<?php
include 'footer.php';
?>

</body>
</html>
