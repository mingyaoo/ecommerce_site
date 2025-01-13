<?php
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION['admin']))
        {   
            header("Location:loginadmin.php");
        }
?>

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
                    <a class="nav-link" href="profileadmin.php">view admin profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="deleteproduct.php">delete product</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="vieworders.php">view orders</a>
                </li>              
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">logout</a>
                </li>
                </ul>
            </div>
        </nav>
        <!-- navbar -->


        
        <div class="card">
            <div class="card-body" style="padding:100px">
                <h1>View orders:</h1>

                <h2>Order details</h2>
                   
                <table class="table">
                        <tr>
                                <th>OrderID</th>
                                <th>Productname</th>
                                <th>Quantity</th>
                                <th>ProductID</th>
                        </tr>
                        
                        <?php
                        include_once("connection.php");
                        $stmt = $conn->prepare("SELECT tblbasket.OrderNo as ono, tblproducts.ProductName as pn,
                                            tblbasketcontent.quantity as qn, tblproducts.ProductID as pid FROM                          
                                            tblbasket INNER JOIN tblbasketcontent ON tblbasket.OrderNo = tblbasketcontent.OrderNo
                                            INNER JOIN tblproducts ON tblproducts.ProductID = tblbasketcontent.ProductID 
                                            WHERE tblbasket.paid = 1");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo("
                            <tr>
                                <td>". $row["ono"]."</td>
                                <td>". $row["pn"]."</td>
                                <td>". $row["qn"]."</td>
                                <td>". $row["pid"]."</td>
                            </tr>");
                        }

                        ?>
                </table>
            </div>
        </div>
            
            
        
        <div class="card">
            <div class="card-body" style="padding:100px">
                <h1>View delivery details:</h1>

                <h2>delivery details</h2>
                   
                <table class="table">
                        <tr>
                                <th>OrderID</th>
                                <th>address1</th>
                                <th>address2</th>
                                <th>city</th>
                                <th>country</th>
                                <th>postcode</th>
                        </tr>
                        
                        <?php
                        include_once("connection.php");
                        $stmt = $conn->prepare("SELECT TblOrders.OrderNo as ono, TblOrders.address1 as ad1, TblOrders.address2 as ad2, 
                        					TblOrders.city as city, TblOrders.country as count, TblOrders.postcode as pc FROM                          
                                            tblbasket INNER JOIN TblOrders ON tblbasket.OrderNo = TblOrders.OrderNo 
                                            WHERE tblbasket.paid = 1");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo("
                            <tr>
                                <td>". $row["ono"]."</td>
                                <td>". $row["ad1"]."</td>
                                <td>". $row["ad2"]."</td>
                                <td>". $row["city"]."</td>
                                <td>". $row["count"]."</td>
                                <td>". $row["pc"]."</td>
                            </tr>");
                        }

                        ?>
                </table>
            </div>
        </div>



</body>
</html>