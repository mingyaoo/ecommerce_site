<html>
    <head>
        <title>admin portal main page</title>  
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- <link href="cssstyle1.css" rel="stylesheet"> -->
    </head> 
    <body>

    
<?php
session_start(); 
if (!isset($_SESSION['email']))
{   
    header("Location:loginadmin.php");
}
?>

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


        <div class="card-footer">
                <p style="text-align:left; color:#C7C7C7">Back to users page?</p>
                <a href="signup.php">
                    <button type="button" class="btn btn-dark">user page</button>
                    <!--this will link me to a sign up for new users page-->
                </a>
        </div>
</body>
</html>