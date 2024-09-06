
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




session_start();

//gets the current date
$today = new DateTime();
$today1 = new DateTime();
$today1= $today1->format('Y-m-d');
$nextMonth = $today->modify('+1 month')->format('Y-m-d');
// modified the date
$stmt1 = $conn->prepare("INSERT INTO tblbasket (OrderNo,UserID,Date_bought, Delivery_date, Delivered, Paid)VALUES (1, :loggedinid, :datebought, :nextMonth, 0,0)");
$stmt1->bindParam(':loggedinid', $_SESSION['loggedinid']);
$stmt1->bindParam(':datebought', $today1);
$stmt1->bindParam(':nextMonth', $nextMonth);

//just need to change orderno
$stmt1->execute();
header('Location: homepage.php');

$conn=null;

?>


