
<!DOCTYPE html>
<html>
<head>
        <title>Sign In Page</title>  
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="cssstyle1.css" rel="stylesheet">

    </head>
<body>
         <!-- this is the bootstrap code for the nav bar of all pages -->
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


        <div class="card">
            <!--this produces a card where i can have a footer, header and body text in order to organise info-->
            <div class="card-header" style="text-align:center; padding:35px">
                <h1>Sign In</h1>
            </div>
            <div class="card-body" style="padding-left:100px; padding-right:100px;">
                <form action="loginadminprocess.php" method="post">
                    <!--creates a form in which im able to send information to my php process page-->
                    <h6>Email:</h6>
                    <input type="text" name="email" class="inputlong"><br>
                    <br>
                    <h6>Password:</h6>
                    <input type="text" name="pw" class="inputlong"><br>

                    <p style="text-align:right; color:#C7C7C7">Forgot your password?</p>
                    <br>
                    <div class="text-center">
                        <button  class="btn btn-primary btn-dark text " value="Sign In">
                        Sign In
                        </button>
                    <!--creates a button with bootstrap in order to submit data into the next form-->

                    </div>
                </form>
                <br>
                <p style="text-align:center; color:#C7C7C7">trouble signing in?</p>
            </div>
        </div>

</body>
</html>

<!-- 

unncecesary sould delete


<div class="col-6" style="padding-top:40px">
                <h1 style="text-align: left;">
                    <?php
                        include_once ("connection.php");
                        $stmt = $conn->prepare("SELECT productname FROM tblproducts WHERE ProductID = 1" );
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo($row["productname"]);
                        }
                    ?>
                </h1>
                <h4 style="text-align: left;">
                    <?php
                        include_once ("connection.php");
                        $stmt = $conn->prepare("SELECT category FROM tblproducts WHERE ProductID = 1" );
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo("part of category: " . $row["category"]);
                        }
                    ?>
                </h4>
                <div class="container" style="padding-bottom:300px;">
                    <p class="productdesc">
                        <?php
                            include_once ("connection.php");
                            $stmt = $conn->prepare("SELECT Description FROM tblproducts WHERE ProductID = 1" );
                            $stmt->execute();
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                echo($row["Description"]);
                            }
                        ?>
                    </p>
                </div>
                <div class="text-center">
                        <button  class="btn btn-secondary text btn-lg" value="buy now">
                        buy now
                        </button>
                        <br>
                        <br>
                        <button  class="btn btn-primary btn-dark text btn-lg" value="cart">
                        Add to Cart
                        </button>
                </div> -->