
<?php
session_start();
array_map("htmlspecialchars", $_POST);
include_once("connection.php");
$stmt = $conn->prepare("UPDATE tblbasket SET Paid=1 WHERE OrderNo=:orderno");
$stmt->bindParam(':orderno', $_SESSION['orderno']);
$stmt->execute();



$stmt = $conn->prepare("INSERT INTO TblOrders(OrderNo, address1, address2, city, country, postcode, cardnumber, expirydate, cardholdername) VALUES (orderno, )");
$stmt->bindParam(':orderno', $_SESSION['orderno']);
$stmt->bindParam(':address1', $_POST["address1"]);
$stmt->bindParam(':address2', $_POST["address2"]);
$stmt->bindParam(':city', $_POST["city"]);
$stmt->bindParam(':country', $_POST["country"]);
$stmt->bindParam(':postcode', $_POST["postcode"]);
$stmt->bindParam(':cardno', $_POST["cardnumber"]);
$stmt->bindParam(':expdate', $_POST["expdate"]);
$stmt->bindParam(':chn', $_POST["cardholdername"]);
$stmt->execute();


echo("
<h1 style='text-align:center;'>You have made a purchase</h1>
<a href='homepage.php'><button>return to website</button></a>

")

?>






