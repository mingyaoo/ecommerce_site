<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblUsers;
CREATE TABLE TblUsers 
(UserID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Email VARCHAR(300) NOT NULL,
Password VARCHAR(300) NOT NULL,
Forename VARCHAR(30) NOT NULL,
Surname VARCHAR(20) NOT NULL,
Address VARCHAR(300) NOT NULL,
Postcode VARCHAR(8) NOT NULL,
PhoneNo INT(11) NOT NULL,
Type TINYINT(1))");
$stmt->execute();
$stmt->closeCursor();
?>