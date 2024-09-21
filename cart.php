
<?php
                session_start();
                ?>
<!DOCTYPE html>
<html>

    <head>
        <title>Cart Page</title>  
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
                    <a class="nav-link" href="javascript:void(0)">Profile</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Cart</a>
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

       

        <div class="row">
            <div class="col-sm-8">
                <div class="container-fluid" style="padding-left:100px; padding-top:100px;">
                    <h2>Items in your Basket</h2>

                        <?php
                            include_once ("connection.php");
                            $stmt = $conn->prepare("SELECT tblproducts.ProductName as pn, tblproducts.Price as pp 
                            FROM tblproducts 
                            INNER JOIN tblbasketcontent ON tblproducts.ProductID = tblbasketcontent.ProductID 
                            INNER JOIN tblbasket ON tblbasketcontent.OrderNo = tblbasket.OrderNo
                            WHERE tblbasket.UserID = :loggedinid");
                            $stmt->bindParam(':loggedinid', $_SESSION['loggedinid']);
                            $stmt->execute();
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                echo(
                                    "<div class='container' style=border-bottom: solid black 2px; font-size: 20px;>"
                                    . $row["pn"] . ":  $" . $row["pp"] . 
                                    "</div>");
                            }
                        ?>



                    <div class="container" style="border-bottom: solid black 2px;">
                        <h5>Additional details (functions to add) </h5>
                    </div>
                    
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container-fluid" style="padding-top:100px;">
                    <h3>How will you pay?</h3>
                    <ul>
                        <li>credit / debit card</li>
                        <li>tng / grab / online transfer</li>
                        <li>cash</li>
                    </ul>
                    <div class="row">
                        <div class="col-sm-8">
                            <b>Total:</b>
                        </div>
                        <div class="col-sm-4">
                        <?php
                            include_once ("connection.php");
                            function multiplynum($num1, $num2) {
                                $result = $num1 * $num2;
                                return $result;
                            }
                            $stmt = $conn->prepare("SELECT tblproducts.Price as pp, tblbasketcontent.quantity as bq FROM tblproducts 
                            INNER JOIN tblbasketcontent ON tblproducts.ProductID = tblbasketcontent.ProductID 
                            INNER JOIN tblbasket ON tblbasketcontent.OrderNo = tblbasket.OrderNo
                            WHERE tblbasket.UserID = :loggedinid AND tblbasket.OrderNo = 1");
                            $stmt->bindParam(':loggedinid', $_SESSION['loggedinid']);
                            $stmt->execute();

                            // $sql = 'SELECT COUNT(*) as count FROM tblbasketcontent WHERE OrderNo = 1'
                            // $newresult = $conn->query($sql);
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                $product = multiplynum($row["pp"], $row["bq"]);
                                echo($product);
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                        <form action="checkout.php" method="post">
                            <button  class="btn btn-primary btn-dark text btn-lg" name="checkout">
                            checkout
                            </button>
                            <br><br>
                        </form>
                </div>
            </div>
        </div>
  




    </body>
</html>
