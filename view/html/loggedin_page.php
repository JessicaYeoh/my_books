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
include '../../model/db_functions.php';

// runs the getAll function to select all the books to get all the attached values
$result = getAll();
?>

<p>
<span id="message2"></span>
</p>

<div id="loggedin_as">
  <p>
    Logged in as: <?php echo $_SESSION['firstname']; ?> (<?php echo $_SESSION["role"]; ?>)
  </p>
</div>

<form id="showBooks_container">

  <?php
  foreach($result as $row) {
// div with id $row['BookID'] created to be called during deleteBook ajax call to remove book from browser after the book is deleted
      echo '<div id="' . $row['BookID'] . '">';

            echo '
              <div class="book">
                <h1> ';
                echo $row['Name'];
                echo ' ';
                echo $row['Surname'];
                echo ' </h1> ';

                echo '<h2> ';
                echo $row['BookTitle'];
                echo '</h2>';

if(isset($row['imageURL']) && ($row['imageURL'] == '../images/')) {
                echo '<img class="cover" src="';
                echo $row['imageURL'];
                echo 'default.png"/> ';
}else {
                echo '<img class="cover" src="';
                echo $row['imageURL'];
                echo ' "/> ';
}

                echo '<h3> ';
                echo $row['YearofPublication'];
                echo '</h3>';

                echo '<h3 class="mill_sold"> No. of millions sold: ';
                echo $row['MillionsSold'];
                echo '</h3>';

            echo '  <div class="update_delete">';

            echo '      <a href="edit.php?BookID=';
                        echo $row['BookID'];
                        echo ' " id="update_button" type="button" class="btn btn-primary">
                        Update </a> ';

// button needs type="button" so ajax doesn't refresh on delete
                        echo '<button href="" id="delete_button" class="btn btn-primary" type="button" onclick="deleteBook(' . $row['BookID'] . ')" value="Delete"> Delete </button>
                        ';

              echo'  </div>';
          echo'  </div>';
    echo'  </div>';
  }
?>
</form>

<?php
include '../html/footer.php';
?>

  </body>
</html>
