<nav class="navbar navbar-default navbar-fixed-top">
    <!-- Navbar Container -->
    <div class="container">

        <!-- Navbar Header [contains both toggle button and navbar brand] -->
        <div class="navbar-header">
            <!-- Toggle Button [handles opening navbar components on mobile screens]-->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#exampleNavComponents" aria-expanded"false">
                <i class="glyphicon glyphicon-align-center"></i>
            </button>

            <!-- Navbar Brand -->
            <a href="#" class="navbar-brand">
                MyBooks
            </a>
        </div>


        <!-- Navbar Collapse [contains navbar components such as navbar menu and forms ] -->
        <div class="collapse navbar-collapse" id="exampleNavComponents">

            <!-- Navbar Menu -->
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="http://localhost/mybooks/view/html/loggedin_page.php">Display Books</a>
                </li>
                <li class="active">
                    <a href="http://localhost/mybooks/view/html/add_newbook.php">Add New Book</a>
                </li>
                <li class="active" id="logout">
                  <form action="../../controller/logout_process.php" method="post">
                    <button id="logout_button" class="btn btn-primary" href="#">Logout</button>
                  </form>
                </li>
            </ul>

        </div>
    </div>
</nav>
