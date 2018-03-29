<?php
  session_start();
  include 'head.php';
?>

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
									<input id="username" type="text" class="form-control" name="username" required>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								</div>

								<div class="form-group">
									<label>
										<input type="checkbox" name="aggree" value="1"> I agree to the Terms and Conditions
									</label>
								</div>

                <input type="hidden" name="action_type" value="add"/>
                <!-- Why is this input inserted? doesn't the action take place with the submit button?-->

								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block" name="register_submit">
										Sign Up
									</button>
								</div>

								<div class="margin-top20 text-center">
									Already have an account? <a href="../index.php">Login</a>
								</div>

								<!-- <div id="register_errDiv">

										<?php
										// if(!isset($_SESSION['error'])) {
										// 	$_SESSION['error'] = "";
										// }
										?>

										<?php
									  //  echo $_SESSION['message'];
									  //  echo $_SESSION['error'];
										//  unset ($_SESSION['error']);
										?>

								</div> -->
							</form>
<!--************************** FIRST PART OF REGISTRATION **************************-->

						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2017 &mdash; Your Company
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- <script src="js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/my-login.js"></script> -->
</body>
</html>
