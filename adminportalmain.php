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
if (!isset($_SESSION['admin']))
{   
    header("Location:loginadmin.php");
}
?>
<!-- ^leads to the signup page where you can also enter if you have an admin accesss -->

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
        <!-- navbar -->


        <div style="padding-bottom:10px; padding-top:100px; background-color:#99DDFF;">
           <h1>Welcome to the admin portal</h1>
        </div>

        <div class="container" style = "padding-top:50px ; padding-bottom:100px;">
            <h3>Functions for an admin:</h3>
            <div class="row">
                <div class="col-sm-3">
                    <a href="storeproduct.php">
                        <button type="button" class="btn btn-dark">store products</button>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="adminusers.php">
                        <button type="button" class="btn btn-dark">add users</button>
                    </a>
                </div>
                <div class="col-sm-3">.col-sm-3</div>
                <div class="col-sm-3">.col-sm-3</div>
            </div>
        </div>

        <!-- this is another box / container to act as a footer for the webpage-->
        <footer>
            <div class="container-fluid", style="background-color: #3FD2C7;padding:75px;">
              
            

            <div class="card-footer" style="padding:50px; font-size:25px">
                    <p style="text-align:left; color:white">Back to users page?</p>
                    <a href="homepage.php">
                        <button type="button" class="btn btn-dark">user page</button>
                        <!--this will link me to a sign up for new users page-->
                    </a>
            </div>
            </div>
        </footer>



</body>
</html>