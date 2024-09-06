
<?php
session_start();
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tblusers WHERE Email =:email AND type = 1;" );
$stmt->bindParam(':email', $_POST['email']);
$stmt->execute();


while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $hashed= $row['Password']; 
    $attempt= $_POST['pw'];
    if(password_verify($attempt,$hashed)){
        $_SESSION['name']=$row["Surname"];
        $_SESSION['loggedinid']=$row["UserID"];
        if (!isset($_SESSION['backURL'])){
            $backURL= "/ecommerce_site/homepage.php"; 
        }else{
            alert("password and username does not match / check adming portal");
            $backURL= "/ecommerce_site/login.php";
        }
        unset($_SESSION['backURL']);
        header('Location: ' . $backURL);
    }else{
        header('Location: login.php');
    }
}
header('Location: login.php');
$conn=null;
?>


