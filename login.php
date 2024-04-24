
<!DOCTYPE html>
<html>
<head>
  
   <title>Login Page</title>
  
</head>
<body>

<form action="loginprocess.php" method= "POST">
 User name:<input type="text" name="Username"><br>
 Password:<input type="password" name="Pword"><br>
  <input type="submit" value="Login">
</form>


</body>
</html>


<?php
    // linking to connection page to gain access to the database
    include_once("connection.php")

    // checking authorised user
    session_start(); 
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    if (!isset($_SESSION['name'])){   
        header("Location:login.php");
    }
    // if incorrect it will redirect to the log in page
    ?>
