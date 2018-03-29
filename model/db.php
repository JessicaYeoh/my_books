<?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=my_books", 'root', '');
        // set attributes
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//shows any errors
    	  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);//shows if computers does not support PDO's
        }
    catch(PDOException $e) //error mode
    	{
    	$error_message = $e->getMessage(); //show the error message
?>


	<h1>Database Connection Error</h1>
	<p>There was an error connecting to the database.</p>
	<!-- display the error message -->
	<p>Error message:
    <?php
      echo $error_message;
    ?>
  </p>

  <?php
  	die();
  	}

  
?>
