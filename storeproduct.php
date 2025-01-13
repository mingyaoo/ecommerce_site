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

        <!-- card in order to format all of the options in one area -->
        <div class="card">
            <div class="card-body" style="padding:100px">
                <h1> creating a new product:</h1>
                <!-- form to send to the process page -->
                <form action="storeproductcode.php" method = "post"  enctype="multipart/form-data">
                    <h6>product name:</h6>
                    <input type="text" name="productname" class="inputlong"><br>
                    <br>
                    <h6>price:</h6>
                    <input type="real" name="price" class="inputlong"><br>
                                <br>
                    <h6>description:</h6>
                    <input type="text" name="descrip" class="inputlong"><br>
                                <br>
                    <h6>quantity:</h6>
                    <input type="integer" name="quant" class="inputlong"><br>
                                <br>
                    <h6>category:</h6>
                    <select name="category">
                        <!-- outputs all the names of the categories in drop down list -->
                        <?php
                            include_once("connection.php");                   
                            $stmt = $conn->prepare("SELECT * FROM TblCategory ORDER BY Category ASC");
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                echo ("
                                    <option value='". $row["CategoryID"]. "'>". $row["Category"]. "</option>
                                ");
                            }
                        ?>
                    </select>
                    <h6>Image:</h6>
                    <input type="file" id="piccy" name="piccy" accept="image/*" class="inputlong"><br>
                                <br>
                    <button  class="btn btn-primary btn-dark text " value="Add Product">
                            Add Product
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
