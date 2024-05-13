
<?php
session_start();
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tblusers WHERE Forename =:username WHERE type = 0;" );
$stmt->bindParam(':username', $_POST['Username']);
$attempt= $_POST['Pword'];
$stmt->execute();


while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $hashed= $row['Password']; 
    if(password_verify($attempt,$hashed)){
        $_SESSION['name']=$row["Surname"];
        $_SESSION['loggedinid']=$row["UserID"];
        if (!isset($_SESSION['backURL'])){
            $backURL= "/"; 
        }else{
            $backURL=$_SESSION['backURL'];
        }
        unset($_SESSION['backURL']);
        header('Location: ' . $backURL);
    }else{
        header('Location: login.php');
    }
}
$conn=null;
?>


// very rough just copied and paste from another page




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
