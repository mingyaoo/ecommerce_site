<!DOCTYPE html>

<html>
<head>
        <title>store products</title>  
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="cssstyle1.css" rel="stylesheet">

        <!-- <link href="cssstyle1.css" rel="stylesheet"> -->
    </head>
<body>

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
                    <a class="nav-link" href="logout.php">logout</a>
                </li>
                </ul>
            </div>
        </nav>

        
        <div class="card">
            <div class="card-body" style="padding:100px">
                <h1> Delete a product:</h1>
                <form action="deleteproductprocess.php" method = "post"  enctype="multipart/form-data">
                    <select name="productid">
                        <!-- sql statement to output all of the products -->
                        <?php
                            include_once("connection.php");                   
                            $stmt = $conn->prepare("SELECT * FROM TblProducts ORDER BY Productname ASC");
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                echo ("
                                    <option value='". $row["ProductID"]. "'>". $row["ProductName"]. "</option>
                                ");
                            }
                        ?>
                    </select>
                    <br><br>
                    <button  class="btn btn-primary btn-dark text " value="Delete Product">
                            Delete Product
                    </button> 
                </form>
                <br>
                <a href="adminportalmain.php">
                        <button type="button" class="btn btn-dark">back to admin page</button>
                        <!--this will link me back to the sign in page for users-->
                    </a>
            </div>
</div>
        


    
</body>
</html>
