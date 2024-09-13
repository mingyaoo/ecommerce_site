
<?php
session_start();
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tblusers WHERE Email =:email AND type = 0;" );
$stmt->bindParam(':email', $_POST['email']);
$stmt->execute();

$backURL= "/ecommerce_site/loginadmin.php";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $hashed= $row['Password']; 
    $attempt= $_POST['pw'];
    if(password_verify($attempt,$hashed)){
        $_SESSION['name']=$row["Forename"];
        $_SESSION['loggedinid']=$row["UserID"];
        $_SESSION['admin'] = "admin";
        if (!isset($_SESSION['backURL'])){
            $backURL= "/ecommerce_site/adminportalmain.php"; 
        }
        unset($_SESSION['backURL']);
    }else{
        header('Location: loginadmin.php');
    }
}

header('Location: ' . $backURL);
$conn=null;
?>


