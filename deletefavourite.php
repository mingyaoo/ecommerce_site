<?php
session_start();
include_once("connection.php");

$stmt = $conn->prepare("DELETE FROM tblfavourites WHERE ProductID = :productid ");
$stmt->bindParam(':productid', $_POST["productid"]);
$stmt->execute();

header('Location: favourite.php');

?>