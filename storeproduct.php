<!DOCTYPE html>
<html>
<head>
        <title>store products</title>  
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
                    <a class="nav-link" href="#">store users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                </ul>
            </div>
        </nav>

    <div class="container" style="padding-top:100px">   
        <h1> creating a new product:</h1>
        <form action="storeproductcode.php" method = "post"  enctype="multipart/form-data">
        product name:<input type="text" name="productname"><br>
        price:<input type="real" name="price"><br>
        description:<input type="text" name="descrip"><br>
        quantity:<input type="integer" name="quant"><br>
        category:<input type="text" name="category"><br>
        Image: <input type="file" id="piccy" name="piccy" accept="image/*"><br>
        <input type="submit" value="Add product">
        </form>
</div>
        
    <?php


    ?>
    <form action="adminportalmain.php"  method = "post">
        <input type="submit" value="back to home">
    </form>

    
</body>
</html>
