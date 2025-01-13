

<!DOCTYPE html>

<?php
                session_start();
                ?>
<html>

    <head>
        <title>Profile Page</title>  
        <meta charset="utf-8">
        <link href="cssstyle1.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
                
<!-- checking for loggedin user -->
        <?php
            if (!isset($_SESSION['loggedinid']))
            {   
                echo("
                <div style='text-align:center'>
                    <h2 style='padding-top:20px'>No user logged in</h2>
                    <a href='login.php'> login page</a>
                    <p class='greytext'> want to go to login page?</p>
                </div>
                ");
            }
        ?>


<!-- uses a container for each different detail to make it clear -->
        <div class="container-fluid" style="padding:100px">
            <div class="profile-container">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Profile picture</h3>
                    <!-- php to output picture of user -->
                    <?php
                            include_once('connection.php');
                            $stmt = $conn->prepare("SELECT * FROM tblusers WHERE UserID = :loggedinid");
                            $stmt->bindParam(':loggedinid', $_SESSION['loggedinid']);
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                    echo ('<img src="profilepic/'.$row["Image"].'" class="img-thumbnail" height="80%" width="80%"><br>');

                                }
                        ?>                    </div>
                <div class="col-sm-8 greytext">
                    <a href="#">edit Profile Picture</a>
                    <p>Must be .jpg, .gif or .png file smaller than 10 MB and at least 400 px by 400 px </p>
                </div>
            </div>
    
            </div>
            <div class="profile-container">
                <div class="row">
                    <div class="col-sm-4">
                        <h5>Your Name -</h5>
                    </div>
                    <div class="col-sm-8" style="font-size:20px"> 
                        <?php
                        include_once ("connection.php");
                        $stmt = $conn->prepare("SELECT forename FROM tblusers WHERE UserID = :loggedinid" );
                        $stmt->bindParam(':loggedinid', $_SESSION['loggedinid']);
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo($row["forename"]);
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="profile-container">
                <div class="row">
                    <div class="col-sm-4">
                        <h5>Email -</h5>
                    </div>
                    <div class="col-sm-8" style="font-size:20px"> 
                        <?php
                        include_once ("connection.php");
                        $stmt = $conn->prepare("SELECT email FROM tblusers WHERE UserID = :loggedinid" );
                        $stmt->bindParam(':loggedinid', $_SESSION['loggedinid']);
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo($row["email"]);
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="profile-container">
                <div class="row">
                    <div class="col-sm-4">
                        <h5>Address -</h5>
                    </div>
                    <div class="col-sm-8" style="font-size:20px"> 
                        <?php
                        include_once ("connection.php");
                        $stmt = $conn->prepare("SELECT address FROM tblusers WHERE UserID = :loggedinid" );
                        $stmt->bindParam(':loggedinid', $_SESSION['loggedinid']);
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo($row["address"]);
                        }
                    ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5>Postcode -</h5>
                    </div>
                    <div class="col-sm-8" style="font-size:20px"> 
                        <?php
                        include_once ("connection.php");
                        $stmt = $conn->prepare("SELECT postcode FROM tblusers WHERE UserID = :loggedinid" );
                        $stmt->bindParam(':loggedinid', $_SESSION['loggedinid']);
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo($row["postcode"]);
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="profile-container">
                <div class="row">
                    <div class="col-sm-4">
                        <h5>phone number -</h5>
                    </div>
                    <div class="col-sm-8" style="font-size:20px"> 
                        <?php
                        include_once ("connection.php");
                        $stmt = $conn->prepare("SELECT PhoneNo FROM tblusers WHERE UserID = :loggedinid" );
                        $stmt->bindParam(':loggedinid', $_SESSION['loggedinid']);
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo($row["PhoneNo"]);
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        
  




    </body>
</html>
