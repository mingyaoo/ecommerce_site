
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
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="adminportalmain.php">
                    My Project
                </a>
                <!-- Links -->
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="storeproduct.php">store product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminusers.php">store users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="storeproduct.php"></a>
                </li>
                </ul>
            </div>
        </nav>


        <div class="card">
            <!--this produces a card where i can have a footer, header and body text in order to organise info-->
            <div class="card-header" style="text-align:center; padding:35px">
                <h1>add users</h1>
            </div>
            <div class="card-body inputlong">
                <form action="adminusersprocess.php" method="post">
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

                <a href="adminportalmain.php">
                    <button type="button" class="btn btn-dark">back to admin page</button>
                    <!--this will link me back to the sign in page for users-->
                </a>

            </div>
        </div>

</body>
</html>


