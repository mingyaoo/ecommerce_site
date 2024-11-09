
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
if (!isset($_SESSION['loggedinidadmin']))
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
                    <a class="nav-link" href="adminusers.php">store users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="storecategory.php">create category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profileadmin.php">view admin profile</a>
                </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid" style="padding:100px">
            <div class="profile-container">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Profile picture</h3>
                    <?php
                            include_once('connection.php');
                            $stmt = $conn->prepare("SELECT * FROM tblusers WHERE UserID = :loggedinid");
                            $stmt->bindParam(':loggedinid', $_SESSION['loggedinidadmin']);
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
                        $stmt->bindParam(':loggedinid', $_SESSION['loggedinidadmin']);
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
                        $stmt->bindParam(':loggedinid', $_SESSION['loggedinidadmin']);
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo($row["email"]);
                        }
                    ?>
                    </div>
                </div>
                <!-- decrypt password -->
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
                        $stmt->bindParam(':loggedinid', $_SESSION['loggedinidadmin']);
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
                        $stmt->bindParam(':loggedinid', $_SESSION['loggedinidadmin']);
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
                        $stmt->bindParam(':loggedinid', $_SESSION['loggedinidadmin']);
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
