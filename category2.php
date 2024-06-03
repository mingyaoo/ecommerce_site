<!DOCTYPE html>
<html>
    


    <head>
        <title>Category 1 Page</title>  
        <meta charset="utf-8">
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

        <!--to start off the webpage, i will put a heading for the category in order to showcase what its about-->
        <div class="container-fluid" style="text-align:center;">
            <h1>Keychain (single plush)</h1>
            <h5 style="color:#C7C7C7;"> brief description (will write it) </h5>
        </div>
        <!--since it is similar to the homepage i can use that code -->
        <div class="row", style="padding:15px;padding-bottom:10px;">
            <div class="col-sm-3">
                <a href="">
                    <img src="promo2.jpg" class="img-thumbnail" alt="promotional item 1" height="80%" width="80%">
                </a>
            </div>
            <div class="col-sm-3">
                <a href="">
                    <img src="promo2.jpg" class="img-thumbnail" alt="promotional item 1" height="80%" width="80%">
                </a>
            </div>
            <div class="col-sm-3">
                <a href="">
                    <img src="promo3.jpg" class="img-thumbnail" alt="promotional item 1" height="80%" width="80%">
                </a>           
            </div>
            <div class="col-sm-3">
                <a href="">
                    <img src="promo4.jpg" class="img-thumbnail" alt="promotional item 1" height="80%" width="80%">
                </a>
            </div>
        </div>
        <div class="row", style="padding:15px;padding-bottom:10px;">
            <div class="col-sm-3">
                <a href="">
                    <img src="promo5.jpg" class="img-thumbnail" alt="promotional item 1" height="80%" width="80%">
                </a>
            </div>
            <div class="col-sm-3">
                <a href="">
                    <img src="promo6.jpg" class="img-thumbnail" alt="promotional item 1" height="80%" width="80%">
                </a>
            </div>
            <div class="col-sm-3">
                <a href="">
                    <img src="promo7.jpg" class="img-thumbnail" alt="promotional item 1" height="80%" width="80%">
                </a>
            </div>
            <div class="col-sm-3">
                <a href="">
                    <img src="promotionproduct1.jpg" class="img-thumbnail" alt="promotional item 1" height="80%" width="80%">
                </a>
            </div>
        </div>
        <button type="button" class="btn btn-secondary">Show less</button>


        <!-- this is another box / container to act as a footer for the webpage-->
        <div class="container-fluid", style="background-color: #3FD2C7;padding:35px;">
            <h3>Ming Yao's Top Picks</h3>
            <h3>Enjoy the website</h3>
        </div>
        </body>
</html>
