<?php
  session_start();
?>

<?php
include "../model/db.php";
include "html/head.php";
?>

<div id="login_container">
  <div id="login_container_color">


      <h1 id="home_title"> My Books</h1>

      <section id="login_form" class="h-100">
        <div class="container h-100">
          <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">

              <div class="card fat">
                <div class="card-body">
                  <h4 class="card-title">Login</h4>
                  <form action="../controller/login_process.php" method="POST">

                    <div class="form-group">
                      <label for="username2">Username</label>
                      <input id="username2" type="text" class="form-control" name="username2" required>
                    </div>

                    <div class="form-group">
                      <label for="password2">Password
                        <a href="forgot.html" class="float-right">
                          Forgot Password?
                        </a>
                      </label>
                      <input id="password2" type="password" class="form-control" name="password2" required data-eye>
                    </div>

                    <div class="form-group">
                      <label>
                        <input type="checkbox" name="remember"> Remember Me
                      </label>
                    </div>

                    <div class="form-group no-margin">
                      <button type="submit" class="btn btn-primary btn-block">
                        Login
                      </button>
                    </div>

                    <div id="user_errDiv">

                        <?php
                        // if there is no error set, do not return a message
                        if(!isset($_SESSION['error'])) {
                          $_SESSION['error'] = "";
                        }
                        ?>

                        <?php
                        echo $_SESSION['error']; //show error message
                        unset ($_SESSION['error']); //this clears the cache to remove previous errors
                        ?>

                    </div>

                  </form>
                </div>
              </div>
              <!-- <div class="footer">
                Copyright &copy; 2018 &mdash; MyBooks
              </div> -->
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

</body>

</html>
