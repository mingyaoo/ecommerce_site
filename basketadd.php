
<?php
include_once("connection.php");
array_map("htmlspecialchars", $_POST);

//connects all information towards my table



//links all data to table
$stmt = $conn->prepare("INSERT INTO tblbasketcontent (OrderNo,ProductID,Quantity)VALUES (1,:productid,:quantity)");
// need to change this so order no follows the correct order instead of just one
$stmt->bindParam(':productid', $_POST["cart"]);
$stmt->bindParam(':quantity', $_POST["quantity"]);

//fetches data from the sign up page
$stmt->execute();
$conn=null;


?>


