<?php
                session_start();
                ?>
                <!-- create a session variable for logging in -->
<!DOCTYPE html>
<html>

    <head>
        <title>Home Page</title>  
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
                            <!-- dropdown menu is linked to each category page via cat id -->
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
                    <!-- rest of functions on nav bar links -->
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
                
        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">

                    <?php
                            include_once('connection.php');
                            echo ('<img src="pictures/chaincat1.jpg" class="d-block w-100" height="500px"><br>');
                            
                        ?>    
                    <div class="carousel-caption">
                        <h3>Colourful overview of keychains</h3>
                        <p>multiple keychains in one photo</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <?php
                            include_once('connection.php');
                            echo ('<img src="pictures/promo3.jpg" class="d-block w-100" height="500px"><br>');
                        ?>   
                </div>
                <div class="carousel-item">
                <?php
                            include_once('connection.php');
                            echo ('<img src="pictures/keychain2.jpg" class="d-block w-100" height="500px"><br>');
                        ?>   
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <!--there will be multiple boxes for pictures and diagrams to showcase some products -->
                <div class="row", style="padding:15px;padding-bottom:10px; background-color:#99DDFF;">
                    <div class="col-sm-3" style="text-align:center">
                    <br>
                    <br>
                        <h1 style="padding-top:45px;">Promotional Products</h1>
                    </div>      
                        <!--php code for outputting all products which is assigned as a promo  -->
                <?php
                        include_once('connection.php');
                        $stmt = $conn->prepare("SELECT * FROM tblproducts WHERE promo = 1");

                        $stmt->execute();
                        $nextrow=1;
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                        // getting images using a folder
                            {
                                echo (" 
                                <div class='col-sm-3'>
                                <form action='productcat1.php' method='post'> 

                                    <input type='hidden' name='item_id' value='" . $row["ProductID"] . "'>
                                    <button type='submit' style='border: none; background: none;'>
                                        <img src='images/".$row["ItemImage"]." 'class='img-thumbnail prodpic'><br>
                                    </button>
                                    <p style=padding-left:15px;><b>" .$row["ProductName"]."</b></p>
                                    </form>            
                                    </div>
                                    ");
                                    // code to break the images onto next line after 4 has passed
                                $nextrow+=1;
                                if($nextrow==4){
                                    echo("</div>");
                                    echo("<div class='row', style='padding:15px;padding-bottom:10px; background-color:#99DDFF;'>");
                                } elseif ($nextrow == 8) {
                                    echo("</div>");
                                    break;
                                }


                            }
                    ?> 
<!-- php code for all the diff categories in my table -->
        <div class="container-fluid" style="background-color:#99DDFF;">
            <h2 style="text-align:center; padding-top:30px">Shop by Category</h2>
            <div class="row", style="padding:15px;padding-bottom:10px;">
            <?php
                        include_once('connection.php');
                        $stmt = $conn->prepare("SELECT * FROM tblcategory");
                        // sql code to output all information about category using images

                        $stmt->execute();
                        $nextrow=1;
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                echo (" 
                                <div class='col-sm-3'>
                                <form action='category1.php' method='post'>
                                    <input type='hidden' name='cat_id' value='" . $row["CategoryID"] . "'>
                                    <button type='submit' style='border: none; background: none;'>
                                        <img src='category/".$row["ItemImage"]." 'class='img-thumbnail prodpic' ><br>
                                    </button>
                                    <p style=padding-left:15px;><b>" .$row["Category"]."</b></p>
                                    </form> 
                                    </div>
                                    ");
                                    // divide the rows
                                $nextrow+=1;
                                if($nextrow==5){
                                    echo("</div>");
                                    echo("<div class='row', style=padding:15px;padding-bottom:10px>");
                                    $nextrow=1;
                                }


                            }
                    ?> 
            </div>
        </div>
        <!-- this is another box / container to act as a footer for the webpage-->
        <footer>
            <div class="container-fluid", style="background-color: #3FD2C7;padding:75px;">
                <h3>section for contacts and about my company (address, shop, contact, etc)</h3>
            
            <!--adding a thank you message for user who had visited website-->
            <h4>
            <?php
                include_once ("connection.php");
                $stmt = $conn->prepare("SELECT forename FROM tblusers WHERE UserID = :loggedinid" );
                $stmt->bindParam(':loggedinid', $_SESSION['loggedinid']);
                $stmt->execute();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo("Thank you " . $row["forename"] . " for visiting our website");
                }
            ?>
            </h4>
            </div>
        </footer>
    </body>
</html>
