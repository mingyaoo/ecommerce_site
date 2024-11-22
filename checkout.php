<!DOCTYPE html>

<?php
session_start(); 
if (!isset($_SESSION['user']))
{   
    header("Location:login.php");
}
?>
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
                

        <?php
            if (!isset($_SESSION['loggedinid']))
            {   
                echo("
                <div class ='container' style='text-align:center'>
                    <h2 style='padding-top:20px'>No user logged in</h2>
                    <a href='login.php'> login page</a>
                    <p class='greytext'> want to go to login page?</p>
                </div>
                ");
            }
        ?>


        
        <h1 style="text-align:center;">Check out for user</h1>


        <div class="container-fluid mt-3">
            <form action = "checkoutprocess.php" method = "post">
            <div class="row">
                <form action = "" method = "post">
                <div class="col-sm-4">
                    <h3 style="text-align:center;">Enter your delivery address</h3>
                    <div class="inputshort">
                        <h6>Country:</h6>
                        <input type="text" name = "country" style="width:100%;"><br>
                        <br>
                        <h6>Full name:</h6>
                        <input type="text" name="fullname" style="width:100%;"><br>
                        <br>
                        <h6>Street address:</h6>
                        <input type="text" name="streetaddress" style="width:100%;"><br>
                        <br>
                        <h6>City:</h6>
                        <input type="text" name="city" style="width:100%;"><br>
                        <br>
                        <h6>Postcode:</h6>
                        <input type="text" name="postcode" style="width:100%;"><br>
                        <br>
                        <h6>Phone Number:</h6>
                        <input type="text" name="phoneno" style="width:100%;"><br>
                        <br>
                    </div>
                </div>


                <div class="col-sm-4" style="padding-top: 75px;">
                    <h3 style="text-align:center;">Enter your payment details</h3>
                    <div class="inputshort">
                        <h6>Cardholder's name:</h6>
                        <input type="text" name = "cardname" style="width:100%;"><br>
                        <br>
                        <h6>Card number:</h6>
                        <input type="text" name="cardno" style="width:100%;"><br>
                        <br>
                        <h6>Expiry date:</h6>
                        <input type="text" name="expdate" style="width:100%;"><br>
                        <br>
                        <h6>cvv:</h6>
                        <input type="text" name="cvv" style="width:100%;"><br>
                        <br>
                    </div>
                </div>


                <div class="col-sm-4" style="padding-top:175px">
                    <div class="row">
                        <div class="col-sm-8">
                            <b>Item(s) total:</b>
                        </div>
                        <div class="col-sm-4">
                <?php
                                include_once ("connection.php");
                                function multiplynum($num1, $num2) {
                                    $result = (int)$num1 * (int)$num2;
                                    return $result;
                                }
                                $stmt = $conn->prepare("SELECT tblproducts.Price as pp, tblbasketcontent.quantity as bq 
                                FROM tblproducts 
                                INNER JOIN tblbasketcontent ON tblproducts.ProductID = tblbasketcontent.ProductID 
                                INNER JOIN tblbasket ON tblbasketcontent.OrderNo = tblbasket.OrderNo
                                WHERE tblbasket.UserID = :loggedinid AND tblbasket.OrderNo = :orderno");
                                $stmt->bindParam(':loggedinid', $_SESSION['loggedinid']);
                                $stmt->bindParam(':orderno', $_SESSION['orderno']);

                                $stmt->execute();

                                $total = 0;
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    $product = multiplynum($row["pp"], $row["bq"]);
                                    
                                    $total = (int)$total + (int)$product;
                                }
                                echo($total."$");
                                

                            ?>
                            </div>
                        </div>
                        <br><br>
                        <button  class="btn btn-primary btn-dark text btn-lg" name="checkout">
                                Proceed to checkout
                                </button>
                                <br><br>



                    </div>
                </div>
        </form>
        </div>





</body>
</html>