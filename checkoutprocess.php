
<?php
session_start();
array_map("htmlspecialchars", $_POST);
include_once("connection.php");
$stmt = $conn->prepare("UPDATE tblbasket SET Paid=1 WHERE OrderNo=:orderno");
$stmt->bindParam(':orderno', $_SESSION['orderno']);
$stmt->execute();

echo("<h1 style='text-align:center;'>You have made a purchase</h1>")

?>





