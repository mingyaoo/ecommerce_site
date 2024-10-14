<?php
session_start();
include_once("connection.php");

$stmt = $conn->prepare("INSERT INTO TblFavourites (UserID, ProductID)VALUES (:loggedinid, :productid)");
$stmt->bindParam(':productid', $_POST["productid"]);
$stmt->bindParam(':loggedinid', $_SESSION['loggedinid']);
$stmt->execute();

header('Location: category1.php');


?>