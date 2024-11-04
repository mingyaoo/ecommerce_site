
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
                

        <div class="container" style="padding:100px">
            <h1>Favourite Items</h1>

            <?php
                include_once ("connection.php");
                $stmt = $conn->prepare("SELECT tblproducts.ProductName as pn, 
                                tblproducts.Description as dn,
                                tblproducts.ProductID as pid,
                                tblproducts.ItemImage as ii
                                FROM tblproducts 
                                INNER JOIN tblfavourites ON tblproducts.ProductID = tblfavourites.ProductID 
                                WHERE tblfavourites.UserID = :loggedinid");
                                $stmt->bindParam(':loggedinid', $_SESSION['loggedinid']);
                                $stmt->execute();
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    echo("
                                    <div class='container-fluid'>
                                        <div class='row'>
                                            <div class='col-sm-4'>
                                                <form action='productcat1.php' method='post'>
                                                    <input type='hidden' name='item_id' value='" . $row["pid"] . "'>
                                                    <button type='submit' style='border: none; background: none;'>
                                                        <img src='images/".$row["ii"]." 'class='img-thumbnail prodpic' ><br>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class='col-sm-8' style='padding-top:25px'>
                                                <h3>" . $row["pn"] . "</h3>
                                                <p> description: " . $row["dn"] . "</li>
                                                <form action='deletefavourite.php' method='post'>
                                                    <button type='submit' class='btn btn-secondary text btn-lg' name='productid' value='" .$row["pid"] ."'> Remove </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    ");
                                }
                            ?>

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
