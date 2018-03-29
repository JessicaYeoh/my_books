<?php
include 'head.php';
include 'nav.php';
include 'header.php';
include '../../model/db.php';
?>

<form id="add_newbook" action="../../controller/addbook_process.php" method="POST">

  <h1> Add new book</h1>

  <div class="form-group">
    <label for="author_name">Author First Name</label>
    <input id="author_name" type="text" class="form-control" name="author_name" value="" required autofocus>
  </div>

  <div class="form-group">
    <label for="author_surname">Author Surname</label>
    <input id="author_surname" type="text" class="form-control" name="author_surname" value="" required autofocus>
  </div>

  <div class="form-group">
    <label for="author_nationality">Nationality</label>
    <input id="author_nationality" type="text" class="form-control" name="author_nationality" value="" required autofocus>
  </div>

  <div class="form-group">
    <label for="author_byear">Birth Year</label>
    <input id="author_byear" type="text" class="form-control" name="author_byear" value="" required autofocus>
  </div>

  <div class="form-group">
    <label for="author_dyear">Death Year</label>
    <input id="author_dyear" type="text" class="form-control" name="author_dyear" value="" required autofocus>
  </div>


  <div class="form-group">
    <label for="book_name">Book Title</label>
    <input id="book_name" type="text" class="form-control" name="book_name" value="" required autofocus>
  </div>

  <div class="form-group">
    <label for="book_title">Original Title</label>
    <input id="book_title" type="text" class="form-control" name="book_title" value="" required autofocus>
  </div>

  <div class="form-group">
    <label for="book_year">Year of Publication</label>
    <input id="book_year" type="text" class="form-control" name="book_year" value="" required autofocus>
  </div>

  <div class="form-group">
    <label for="book_lang">Language of Book</label>
    <input id="book_lang" type="text" class="form-control" name="book_lang" value="" required autofocus>
  </div>

  <div class="form-group">
    <label for="book_sold">Millions Sold</label>
    <input id="book_sold" type="text" class="form-control" name="book_sold" value="" required autofocus>
  </div>

  <input type="hidden" name="action_type" value="add"/>

  <div class="form-group no-margin">
    <button type="submit" class="btn btn-primary btn-block">
      Add Book
    </button>
  </div>

</form>
