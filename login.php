
<!DOCTYPE html>

<?php
                session_start();
                ?>
<html>
<head>
        <title>Sign In Page</title>  
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="cssstyle1.css" rel="stylesheet">

    </head>
<body>
         <!-- this is the bootstrap code for the nav bar of all pages -->
         <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="homepage.php">
                    My Project
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                <ul class= "nav nav-pills">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color:white" data-bs-toggle="dropdown" href="categories.php">Categories</a>
                        <ul class="dropdown-menu">
                            <?php
                                include_once("connection.php");
                                $stmt = $conn->prepare("SELECT * FROM tblcategory");
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                echo (" 
                                <form action='category1.php' method='post'>
                                    <input type='hidden' name='cat_id' value='" . $row["CategoryID"] . "'>
                                    
                                    <li><a class='dropdown-item'>
                                    <button type='submit' style='border: none; background: none;'>
                                    " . $row["Category"]. "</button></a></li>
                                    </form> 
                                    ");
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-primary" type="button">Search</button>
                </form>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="favourite.php">Favourites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
                


        <div class="card">
            <!--this produces a card where i can have a footer, header and body text in order to organise info-->
            <div class="card-header" style="text-align:center; padding:35px">
                <h1>Sign In</h1>
            </div>
            <div class="card-body" style="padding-left:100px; padding-right:100px;">
                <form action="loginprocess.php" method="post">
                    <!--creates a form in which im able to send information to my php process page-->
                    <h6>Email:</h6>
                    <input type="text" name="email" class="inputlong" required><br>
                    <br>
                    <h6>Password:</h6>
                    <input type="text" name="pw" class="inputlong" required><br>

                    <p style="text-align:right; color:#C7C7C7">Forgot your password?</p>
                    <br>
                    <div class="text-center">
                        <button  class="btn btn-primary btn-dark text " value="Sign In">
                        Sign In
                        </button>
                    <!--creates a button with bootstrap in order to submit data into the next form-->

                    </div>
                </form>
                <br>
                <p style="text-align:center; color:#C7C7C7">trouble signing in?</p>
            </div>


            <div class="card-footer">
                <p style="text-align:left; color:#C7C7C7">Dont have an account?</p>
                <a href="signup.php">
                    <button type="button" class="btn btn-dark">Create an account</button>
                    <!--this will link me to a sign up for new users page-->
                </a>
                <p style="text-align:left; color:#C7C7C7">Wish to log out of account?</p>

                <a href="logout.php">
                    <button type="button" class="btn btn-dark">Logout</button>
                    <!--this will link me to a logout page in which unsets user binds-->
                </a>
                <p style="text-align:left; color:#C7C7C7">Sign into admin?</p>
                <a href="adminportalmain.php">
                    <button type="button" class="btn btn-dark">Admin Portal</button>
                    <!--this will link me to a sign up for new users page-->
                </a>

            </div>
        </div>

</body>
</html>
