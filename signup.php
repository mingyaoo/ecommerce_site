
<!DOCTYPE html>
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
                            <li><a class="dropdown-item" href="category1.php">keychain (single plush)</a></li>
                            <li><a class="dropdown-item" href="category2.php">chains</a></li>
                            <li><a class="dropdown-item" href="category3.php">category-3</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-primary" type="button">Search</button>
                </form>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Favourites</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Notifications</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Profile</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Cart</a>
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
                <h1>Sign Up</h1>
            </div>
            <div class="card-body inputlong">
                <form action="signupprocess.php" method="post">
                    <!--creates a form in which im able to send information to my php process page-->
                        <h6>Email:</h6>
                        <input type="text" name="emailuser" class="inputlong"><br>
                        <br>
                        <h6>Password:</h6>
                        <input type="text" name="pwuser" class="inputlong"><br>
                        <br>
                        <h6>Forename:</h6>
                        <input type="text" name="forename" class="inputlong"><br>
                        <h6>Surname:</h6>
                        <input type="text" name="surname" class="inputlong"><br>
                        <br>
                        <h6>Address:</h6>
                        <input type="text" name="address" class="inputlong"><br>
                        <br>
                        <h6>Postcode:</h6>
                        <input type="text" name="postcode" class="inputlong"><br>
                        <br>
                        <h6>PhoneNo:</h6>
                        <input type="text" name="phonenumber" class="inputlong"><br>
                        <br>
                        Image: <input type="file" id="piccy" name="piccy" accept="image/*"><br>
                        <br>
                        Role:<select name="role">
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        <br>
                        <br>
                        <div class="text-center">
                            <button  class="btn btn-primary btn-dark text " value="Add User">
                            Sign Up
                            </button>
                        </div>                
                    </form>

            </div>

            
            <div class="card-footer ">
                <p style="text-align:left; color:#C7C7C7">Have an account?</p>
                <p style="text-align:left; color:#C7C7C7">return to sign in</p>

                <a href="login.php">
                    <button type="button" class="btn btn-dark">Sign Into Account</button>
                    <!--this will link me back to the sign in page for users-->
                </a>

            </div>
        </div>

</body>
</html>


