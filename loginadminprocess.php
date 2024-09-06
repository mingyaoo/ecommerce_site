
<?php
session_start();
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tblusers WHERE Email =:email AND type = 0;" );
$stmt->bindParam(':email', $_POST['email']);
$stmt->execute();


while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $hashed= $row['Password']; 
    $attempt= $_POST['pw'];
    if(password_verify($attempt,$hashed)){
        $_SESSION['email']=$row["email"];
        $_SESSION['loggedinid']=$row["UserID"];
        if (!isset($_SESSION['backURL'])){
            $backURL= "/ecommerce_site/adminportalmain.php"; 
        }else{
            $backURL=$_SESSION['backURL'];
        }
        unset($_SESSION['backURL']);
        header('Location: ' . $backURL);
    }else{
        header('Location: loginadmin.php');
    }
}
header('Location: loginadmin.php');
$conn=null;
?>


