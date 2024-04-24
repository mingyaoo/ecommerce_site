
<!DOCTYPE html>
<html>

    <head>
        <title>Home Page</title>  
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <!-- this is the bootstrap code for the nav bar of all pages -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="javascript:void(0)">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                <ul class= "nav nav-pills">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color:white" data-bs-toggle="dropdown" href="#">categories</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Link 1</a></li>
                            <li><a class="dropdown-item" href="#">Link 2</a></li>
                            <li><a class="dropdown-item" href="#">Link 3</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-primary" type="button">Search</button>
                </form>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">favourites</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">notifications</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">profile</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">cart</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <!-- this describes a container / box to outline the initial diagram, which i will convert into a carousel -->
        <div class = "container-fluid", style="background-color: #99DDFF;padding:100px;">
            <h1></h1>
            <h3 style="text-align: centre;"> carousel photos</h3>
            <h1></h1>
        </div>

        <!--there will be multiple boxes for pictures and diagrams to showcase some products -->
        <div class="row", style="padding:50px;">
            <div class="col-sm-3">item 1</div>
            <div class="col-sm-3">item 2</div>
            <div class="col-sm-3">item 3</div>
            <div class="col-sm-3">item 4</div>
        </div>

        <!-- this is another box / container to act as a footer for the webpage-->
        <div class="container-fluid", style="background-color: #3FD2C7;padding:75px;">
            <h3>section for contacts and about my company (address, shop, contact, etc)</h3>
        </div>

    




    </body>
</html>
