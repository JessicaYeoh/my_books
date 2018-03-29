<?php
session_start();
if(!$_SESSION['login']){
  header("location:../index.php");
  die;
}
?>

<?php
include 'head.php';
include 'nav.php';
include 'header.php';
include '../../model/db.php';
include '../../model/db_functions.php';
?>

<?php
$showBooks = "SELECT * FROM book inner join author on book.authorID = author.authorID";
$stmt = $conn->prepare($showBooks);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<form id="showBooks_container">

  <p>
  <span id="message2"></span>
  </p>

  <?php
  foreach($result as $row) {
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

            echo '<img class="cover" src="';
            echo $row['imageURL'];
            echo ' "/> ';

            echo '<h3> ';
            echo $row['YearofPublication'];
            echo '</h3>';

            echo '<h3> No. of millions sold: ';
            echo $row['MillionsSold'];
            echo '</h3>';

        echo '  <div class="update_delete">';

        echo '      <a href="edit.php?BookID=';
                    echo $row['BookID'];
                    echo ' " id="update_button" type="button" class="btn btn-primary">
                    Update </a> ';

                    echo '<button href="" id="delete_button" class="btn btn-primary" type="button" onclick="deleteUser(' . $row['BookID'] . ')" value="Delete"> Delete </button>
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

<!-- <div id="showBooks_container"> -->
  <?php
  // foreach($result as $row) {
  //   echo '
  //     <div class="book">
  //       <h1> ' . $row['Name'] . ' ' . $row['Surname'] . ' </h1>
  //       <h2> ' . $row['BookTitle'] . ' </h2>
  //       <img class="cover" src=' . $row['imageURL'] . ' />
  //       <h3> ' . $row['YearofPublication'] . ' </h3>
  //       <h3> No. of millions sold: ' . $row['MillionsSold'] . ' </h3>';
  //
  //     echo  '<div class="update_delete">';
  //          echo  '<button href="" id="update_button" type="button" class="btn btn-primary"> Update </button>';
  //
  //         echo '  <button id="delete_button" type="button" class="btn btn-primary"> Delete </button>'
  //     echo '</div>';
  //   echo '</div>';
  // }
  ?>
<!-- </div> -->
