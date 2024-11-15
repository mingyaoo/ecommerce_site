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
                <h1> Create a new category:</h1>
                <form action="storecatprocess.php" method = "post"  enctype="multipart/form-data">
                    <h6>category name:</h6>
                    <input type="text" name="categoryname" class="inputlong"><br>
                    <br>
                    <h6>Image:</h6>
                    <input type="file" id="piccy" name="piccy" accept="image/*" class="inputlong"><br>
                                <br>
                    <button  class="btn btn-primary btn-dark text " value="create category">
                            create category
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
