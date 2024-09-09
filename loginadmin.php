
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
                    <a class="nav-link" href="#">store users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                </ul>
            </div>
        </nav>


        <div class="card">
            <!--this produces a card where i can have a footer, header and body text in order to organise info-->
            <div class="card-header" style="text-align:center; padding:35px">
                <h1>Sign In</h1>
            </div>
            <div class="card-body" style="padding-left:100px; padding-right:100px;">
                <form action="loginadminprocess.php" method="post">
                    <!--creates a form in which im able to send information to my php process page-->
                    <h6>Email:</h6>
                    <input type="text" name="email" class="inputlong"><br>
                    <br>
                    <h6>Password:</h6>
                    <input type="text" name="pw" class="inputlong"><br>

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
        </div>


        
        <div class="card-footer">
                <p style="text-align:left; color:#C7C7C7">Back to user login?</p>
                <a href="login.php">
                    <button type="button" class="btn btn-dark">user login</button>
                </a>
                <p style="text-align:left; color:#C7C7C7">back to main website?</p>

                <a href="homepage.php">
                    <button type="button" class="btn btn-dark">main website</button>
                </a>
                
            </div>

</body>
</html>
