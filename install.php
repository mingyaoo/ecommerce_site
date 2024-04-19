<?php
// linking to connection.php to gain access to the database
include_once("connection.php");

// creating 
// First table for users
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

// second table for products
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblProducts;
CREATE TABLE TblProducts 
(ProductID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ProductName VARCHAR(100) NOT NULL,
Price INT(10) NOT NULL,
Description VARCHAR(300) NOT NULL,
Category VARCHAR(300) NOT NULL,
ItemImage VARCHAR(100) NOT NULL,
Quantity INT(6))");
$stmt->execute();
$stmt->closeCursor();


// third table for basket
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblBasket;
CREATE TABLE TblBasket 
(OrderNo INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
UserID INT(6) NOT NULL,
Date_bought DATE NOT NULL,
Delivery_date DATE NOT NULL,
Delivered INT(1) NOT NULL,
Paid INT(1) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();

// fourth table for basket contents
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblBasketContent;
CREATE TABLE TblBasketContent 
(OrderNo INT(6) NOT NULL,
ProductID INT(6) NOT NULL,
Quantity INT(2) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();

?>