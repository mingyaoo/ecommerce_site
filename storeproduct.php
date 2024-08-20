<!DOCTYPE html>
<html>
<head>
    
    <title>Page title</title>
    
</head>
<body>

        
    <form action="storeproductcode.php" method = "post"  enctype="multipart/form-data">
    product name:<input type="text" name="productname"><br>
    price:<input type="real" name="price"><br>
    description:<input type="text" name="descrip"><br>
    quantity:<input type="integer" name="quant"><br>
    category:<input type="text" name="category"><br>
    Image: <input type="file" id="piccy" name="piccy" accept="image/*"><br>
    <input type="submit" value="Add product">
    </form>

        
    <?php


    ?>
    <form action="adminportalmain.php"  method = "post">
        <input type="submit" value="back to home">
    </form>

    
</body>
</html>
