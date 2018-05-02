<?php
session_start();
if(!$_SESSION['login']){
  header("location: ../../index.php");
  die;
}

include 'head.php';
include 'nav.php';
include 'header.php';
include '../../model/db.php';
?>

    <form id="add_newbook" action="../../controller/addbook_process.php" method="POST" enctype="multipart/form-data">

      <h1> Add new book</h1>

      <div id="image_preview"><img id="previewing" src="../images/default.png" /></div>
        <hr id="line">

      <div class="form-group">
        <label for="file">Select Your Image</label>
        <input class="file-upload" type="file" name="file" id="file"/>
        <input type="hidden" name="image_id" id="image_id" value="2" class="submit" />
      </div>

      <div id="file_error_msg">
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
        <input id="author_name" type="text" class="form-control" name="author_name" value="" required autofocus pattern="^\p{Lu}\p{L}+(?:[\s,.'-]\p{L}+)?$" oninvalid="setCustomValidity('Incorrect format! First letter must be uppercase.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="author_surname">Author Surname</label>
        <input id="author_surname" type="text" class="form-control" name="author_surname" value="" required autofocus pattern="^\p{Lu}\p{L}+(?:[\s,.'-]\p{L}+)?$" oninvalid="setCustomValidity('Incorrect format! First letter must be uppercase.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="author_nationality">Nationality</label>
        <input id="author_nationality" type="text" class="form-control" name="author_nationality" value="" required autofocus pattern="^[A-Z][a-zA-Z-\]{1,50}$" oninvalid="setCustomValidity('Incorrect format! First letter must be uppercase.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="author_byear">Birth Year</label>
        <input id="author_byear" type="text" class="form-control" name="author_byear" value="" required autofocus pattern="[0-9]{4}" oninvalid="setCustomValidity('Please enter 4 numbers as a year')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="author_dyear">Death Year</label>
        <input id="author_dyear" type="text" class="form-control" name="author_dyear" value="" autofocus pattern="[0-9]{4}" oninvalid="setCustomValidity('Please enter 4 numbers as a year')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="book_name">Book Title</label>
        <input id="book_name" type="text" class="form-control" name="book_name" value="" required autofocus pattern="^[A-Z][a-zA-Z0-9-_\.]{1,100}$" oninvalid="setCustomValidity('Incorrect format! First letter must be uppercase.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="book_title">Original Title</label>
        <input id="book_title" type="text" class="form-control" name="book_title" value="" required autofocus pattern="^[A-Z][a-zA-Z0-9-_\.]{1,100}$" oninvalid="setCustomValidity('Incorrect format! First letter must be uppercase.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="book_year">Year of Publication</label>
        <input id="book_year" type="text" class="form-control" name="book_year" value="" required autofocus pattern="[0-9]{4}" oninvalid="setCustomValidity('Please enter 4 numbers as a year')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="genre">Genre</label>
        <input id="genre" type="text" class="form-control" name="genre" value="" required autofocus pattern="^[A-Z][a-zA-Z-\]{1,30}$" oninvalid="setCustomValidity('Incorrect format! First letter must be uppercase.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="book_lang">Language of Book</label>
        <input id="book_lang" type="text" class="form-control" name="book_lang" value="" required autofocus pattern="^[A-Z][a-zA-Z-\]{1,30}$" oninvalid="setCustomValidity('Incorrect format! First letter must be uppercase.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="book_sold">Millions Sold</label>
        <input id="book_sold" type="text" class="form-control" name="book_sold" value="" required autofocus pattern="[0-9]{1,3}" oninvalid="setCustomValidity('Invalid format')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="plot">Plot</label>
        <input id="plot" type="text" class="form-control" name="plot" value="" required autofocus>
      </div>

      <div class="form-group">
        <label for="plotSource">Plot Source</label>
        <input id="plotSource" type="text" class="form-control" name="plotSource" value="" required autofocus>
      </div>

      <div class="form-group">
        <label for="ranking">Ranking</label>
        <input id="ranking" type="text" class="form-control" name="ranking" value="" required autofocus pattern="[0-9]{2}" min="1" max="10" oninvalid="setCustomValidity('Invalid format')" oninput="setCustomValidity('')">
      </div>

      <input type="hidden" name="action_type" value="add"/>

      <div class="form-group no-margin">
        <input type="submit" name="add_book" class="btn btn-primary btn-block" value="Add Book">
      </div>

    </form>

<h4 id='loading' >loading..</h4>
<!-- <div id="message"></div> -->


<?php
include 'footer.php';
?>

</body>
</html>
