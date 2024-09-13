
<?php
                session_start();
                ?>
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
                    <!-- <img src="keychain2.jpg" alt="" class="d-block w-100" height="500px"> -->
                </div>
                <div class="carousel-item">
                <?php
                            include_once('connection.php');
                            echo ('<img src="pictures/keychain2.jpg" class="d-block w-100" height="500px"><br>');
                        ?>   
                    <!-- <img src="keychain3.jpg" alt="" class="d-block w-100" height="500px"> -->
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
                <h1 style="padding-top:45px;">Promotional Products</h1>
            </div>
            <div class="col-sm-3">
                <a href="productcat1.php">
                    <!-- this selects the ID from the table in order to find the image corresponding to that product -->
                    <?php
                        include_once('connection.php');
                        $stmt = $conn->prepare("SELECT * FROM tblproducts WHERE ProductID = 1");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                echo($row["ProductName"]);
                                echo ('<img src="images/'.$row["ItemImage"].'" class="img-thumbnail" height="80%" width="80%"><br>');

                            }
                    ?>    
                </a>
            </div>
            <div class="col-sm-3">
                <a href="">
                    <?php
                            include_once('connection.php');
                            $stmt = $conn->prepare("SELECT * FROM tblproducts WHERE ProductID = 2");
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                    echo($row["ProductName"]);
                                    echo ('<img src="images/'.$row["ItemImage"].'" class="img-thumbnail" height="80%" width="80%"><br>');

                                }
                        ?>    
                </a>           
            </div>
            <div class="col-sm-3">
                <a href="">
                <?php
                        include_once('connection.php');
                        $stmt = $conn->prepare("SELECT * FROM tblproducts WHERE ProductID = 3");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                echo($row["ProductName"]);
                                echo ('<img src="images/'.$row["ItemImage"].'" class="img-thumbnail" height="80%" width="80%"><br>');

                            }
                    ?>    
                </a>
            </div>
        </div>
        <div class="row", style="padding:15px;padding-bottom:10px; background-color:#99DDFF;">
            <div class="col-sm-3">
                <a href="">
                <?php
                        include_once('connection.php');
                        $stmt = $conn->prepare("SELECT * FROM tblproducts WHERE ProductID = 4");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                echo($row["ProductName"]);
                                echo ('<img src="images/'.$row["ItemImage"].'" class="img-thumbnail" height="80%" width="80%"><br>');

                            }
                    ?>    
                </a>
            </div>
            <div class="col-sm-3">
                <a href="">
                <?php
                        include_once('connection.php');
                        $stmt = $conn->prepare("SELECT * FROM tblproducts WHERE ProductID = 5");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                echo($row["ProductName"]);
                                echo ('<img src="images/'.$row["ItemImage"].'" class="img-thumbnail" height="80%" width="80%"><br>');

                            }
                    ?>                    </a>
            </div>
            <div class="col-sm-3">
                <a href="">
                <?php
                        include_once('connection.php');
                        $stmt = $conn->prepare("SELECT * FROM tblproducts WHERE ProductID = 6");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                echo($row["ProductName"]);
                                echo ('<img src="images/'.$row["ItemImage"].'" class="img-thumbnail" height="80%" width="80%"><br>');

                            }
                    ?>                    </a>
            </div>
            <div class="col-sm-3">
                <a href="">
                <?php
                        include_once('connection.php');
                        $stmt = $conn->prepare("SELECT * FROM tblproducts WHERE ProductID = 7");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                echo($row["ProductName"]);
                                echo ('<img src="images/'.$row["ItemImage"].'" class="img-thumbnail" height="80%" width="80%"><br>');

                            }
                    ?>                    </a>
            </div>
        </div>
        <div class="container-fluid" style="background-color:#99DDFF;">
            <h2 style="text-align:center; padding-top:30px">Shop by Category</h2>
            <div class="row", style="padding:15px;padding-bottom:10px;">
            <div class="col-sm-3">
                <a href ="category1.php">
                <?php
                include_once('connection.php');
                echo ('<img src="category/keychaincat1.jpg" class="d-block w-100" height="80%px" width="80%"><br>');
                ?>                        
                <h4>keychain</h4>
                </a>
            </div>
            <div class="col-sm-3">
                <a href ="category2.php">
                    <img src="chaincat1.jpg" class="img-thumbnail" alt="promotional item 1" height="80%" width="80%">
                    <h4>chains</h4>
                </a>
            </div>
            <div class="col-sm-3">
                <a href ="category2.php">
                    <img src="keychain1.jpg" class="img-thumbnail" alt="promotional item 1" height="80%" width="80%">
                    <h4>category-3</h4>
                </a>
            </div>
            <div class="col-sm-3">
                <a href ="category2.php">
                    <img src="keychain1.jpg" class="img-thumbnail" alt="promotional item 1" height="80%" width="80%">
                    <h4>category-4</h4>
                </a>
            </div>
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
