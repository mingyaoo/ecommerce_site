
<?php
session_start();
include_once("connection.php");
array_map("htmlspecialchars", $_POST);

if (!isset($_SESSION['user']))
{   
    header("Location:login.php");
}

//connects all information towards my table


//links all data to table
$stmt = $conn->prepare("INSERT INTO tblbasketcontent (OrderNo,ProductID,Quantity)VALUES (:orderno,:productid,:quantity)");
// uses the order from the session variable
$stmt->bindParam(':orderno', $_SESSION['orderno']);
$stmt->bindParam(':productid', $_POST["cart"]);
$stmt->bindParam(':quantity', $_POST["quantity"]);

//fetches data from the sign up page
$stmt->execute();



header('Location: homepage.php');

$conn=null;

?>


