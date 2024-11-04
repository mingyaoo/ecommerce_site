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
                


<!-- bootstrap to organise grids of 2 columns-->
        <div class="row">
            <div class="col-6" style="padding-top:40px">
                <?php
                        include_once('connection.php');
                        $stmt = $conn->prepare("SELECT * FROM tblproducts WHERE ProductID = :item_id");
                        $stmt->bindParam(':item_id', $_POST["item_id"]);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                echo ('<img src="images/'.$row["ItemImage"].'" class="img-thumbnail" height="80%" width="80%"><br>');

                            }
                    ?> 
                <br>
                <h3>Reviews</h3>
                <p style="color:blue">______________________________________________________________________________</p>
                <ul class="productdesc">
                    <li>review 1</li>
                    <li>review 2</li>
                    <li>review 3</li>
                </ul>
            </div>
            
            <div class="col-6" style="padding-top:40px">
                <?php
                    include_once ("connection.php");
                    $stmt = $conn->prepare("SELECT * FROM tblproducts WHERE ProductID = :item_id" );
                    $stmt->bindParam(':item_id', $_POST["item_id"]);
                    $stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo("
                            <h1 style=text-align:left;>" .$row["ProductName"]. "</h1>
                            <div class='container' style='padding-bottom:300px;'>
                                <p class='productdesc'>" .$row["Description"]. "</p>
                                <h6 style=text-align:centre;>Price of item:      $". $row["Price"]. "</h6>
                            </div>
                            ");

                    }
                ?>

                <div style="text-align: right; padding-right:50px;">
                    <form action="favouriteprocess.php" method="post">
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM tblproducts WHERE ProductID = :item_id" );
                        $stmt->bindParam(':item_id', $_POST["item_id"]);
                        $stmt->execute();


                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                            {

                                echo (" 
                                <button type='submit' class='btn btn-secondary text btn-lg' name='productid' value='" .$row["ProductID"] ."'> favourites </button>
                               
                                    ");
                            }

                        ?>
                    </form>
                </div>


                <div class="text-center">

                    <button  class="btn btn-secondary text btn-lg" value="buy now">
                        buy now
                    </button>
                    <br>
                    <br>
                    <form action="basketadd.php" method="post">
                            <?php
                                include_once ("connection.php");
                                $stmt = $conn->prepare("SELECT * FROM tblproducts WHERE ProductID = :item_id" );
                                $stmt->bindParam(':item_id', $_POST["item_id"]);
                                $stmt->execute();
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    echo("
                                        <button  class='btn btn-primary btn-dark text btn-lg' name='cart' value='". $row["ProductID"]. "'>
                                        Add to Cart
                                        </button>
        
                                        ");

                                }
                            ?>


                            <br><br>
                            <label for="quantity">Quantity:</label>
                            <select name="quantity" id="quantity">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>

                    </form>
                </div>
            </div>
        </div>
        <br>
        
        

        <!-- this is another box / container to act as a footer for the webpage-->
        <div class="container-fluid", style="background-color: #3FD2C7;padding:35px;">
            <h3>Ming Yao's Top Picks</h3>
            <h3>Enjoy the website</h3>
        </div>
    </body>



































    