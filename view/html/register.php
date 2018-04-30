<?php
  session_start();
  if(!$_SESSION['login']){
    header("location: ../../index.php");
    die;
  }

  if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == 'Employee'){
    header("location: ../../index.php");
    die;
  }

  include 'head.php';
  include 'nav.php';
  include 'header.php';
?>

<div id="register_success_msg">
  <?php
      //if $_SESSION['message'] is not set then set it as nothing to eliminate an undeclared variable error
      if (!isset($_SESSION['message'])){
          $_SESSION['message'] = "";
      }
      echo $_SESSION['message'];
      unset ($_SESSION['message']); //this line clears what is set in the session variable['message']
  ?>
</div>

	<section id="register_form" class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Register Account</h4>

<!--************************** FIRST PART OF REGISTRATION **************************-->
							<form id="register_section1" action="../../controller/submit_register.php" method="POST">

								<div class="form-group">
									<label for="username">Username</label>
									<input id="username" type="text" class="form-control" name="username" required onkeyup="checkemail()" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{4,20}$" oninvalid="setCustomValidity('Minimum 5 characters starting with a letter, no special characters allowed')" oninput="setCustomValidity('')">
								</div>

<div id="email_status"></div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="setCustomValidity('Minimum 8 characters, atleast 1 uppercase, lowercase and number. Special characters allowed.')" oninput="setCustomValidity('')">
								</div>

                <div class="form-group">
									<label for="firstName">First Name</label>
									<input id="firstName" type="text" class="form-control" name="firstName" required pattern="^\p{Lu}\p{L}+(?:[\s,.'-]\p{L}+)?$" oninvalid="setCustomValidity('Incorrect format! First letter must be uppercase.')" oninput="setCustomValidity('')">
								</div>

                <div class="form-group">
                  <label for="surname">Surname</label>
                  <input id="surname" type="text" class="form-control" name="surname" required pattern="^\p{Lu}\p{L}+(?:[\s,.'-]\p{L}+)?$" oninvalid="setCustomValidity('Incorrect format! First letter must be uppercase.')" oninput="setCustomValidity('')">
                </div>


                <label> User role</label>

                <div class="form-check">
                  <label class="form-check-label" for="admin">
                    <input id="admin" class="form-check-input" type="checkbox" store="checkbox1" value="Administrator" name="userRole">
                    Administrator
                  </label>
                </div>

                <div class="form-check">
                  <label class="form-check-label" for="employee">
                    <input id="employee" class="form-check-input" type="checkbox" store="checkbox2" value="Employee" name="userRole">
                    Employee
                  </label>
                </div>


                <input type="hidden" name="action_type" value="add"/>

								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block" name="register_submit">
										Sign Up
									</button>
								</div>

							</form>


						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

<?php
include 'footer.php';
?>

</body>
</html>
