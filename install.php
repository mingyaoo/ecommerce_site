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
Image VARCHAR(100) NOT NULL,
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

// ...............................................................................................

// inserting default data into the different tables
$email = "example@example.com";
$hashed_password = password_hash("password", PASSWORD_DEFAULT);
$forename = "john";
$surname = "smith";
$address = "2 milton road, oundle";
$postcode = "PE8 4AG";
$phoneno = "04698546204";
$type = "1";
$image = "user1.jpg";

// customer default data in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblUsers (UserID,Email,Password,Forename,Surname, Address, Postcode, PhoneNo, Image, Type)VALUES (null,:email,:password,:forename, :surname, :address, :postcode, :phone, :image, :role)");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $hashed_password);
$stmt->bindParam(':forename', $forename);
$stmt->bindParam(':surname', $surname);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':postcode', $postcode);
$stmt->bindParam(':phone', $phoneno);
$stmt->bindParam(':role', $type);
$stmt->bindParam(':image', $image);

// linking all the data to table
$stmt->execute();

$email2 = "example2@example.com";
$hashed_password2 = password_hash("password2", PASSWORD_DEFAULT);
$forename2 = "Rob";
$surname2 = "Jackel";
$address2 = "2 Benefield road, oundle";
$postcode2 = "PE8 4ET";
$phoneno2 = "04396837291";
$type2 = "0";
// admin default data in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblUsers (UserID,Email,Password,Forename,Surname, Address, Postcode, PhoneNo, Type)VALUES (null,:email2,:password2,:forename2, :surname2, :address2, :postcode2, :phone2, :role2)");
$stmt->bindParam(':email2', $email2);
$stmt->bindParam(':password2', $hashed_password2);
$stmt->bindParam(':forename2', $forename2);
$stmt->bindParam(':surname2', $surname2);
$stmt->bindParam(':address2', $address2);
$stmt->bindParam(':postcode2', $postcode2);
$stmt->bindParam(':phone2', $phoneno2);
$stmt->bindParam(':role2', $type2);
// linking all the data to table
$stmt->execute();



$name = "Purple Single Plush Keychain";
$price = "5.0";
$description = "description details for one";
$category = "keychain";
$itemimage = "promo2.jpg";
$quantity = "3";
// product default data1 in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,Category, ItemImage, Quantity)VALUES (null,:name, :price,:description,:category, :itemimage, :quantity)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':itemimage', $itemimage);
$stmt->bindParam(':quantity', $quantity);
// linking all the data to table
$stmt->execute();


$name = "purple pink white keychain";
$price = "5.0";
$description = "description details for 2";
$category = "keychain";
$itemimage = "keychain4.jpg";
$quantity = "3";
// product default data1 in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,Category, ItemImage, Quantity)VALUES (null,:name, :price,:description,:category, :itemimage, :quantity)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':itemimage', $itemimage);
$stmt->bindParam(':quantity', $quantity);
// linking all the data to table
$stmt->execute();


$name = "turtle neck layered crochet";
$price = "6.0";
$description = "description details for 3";
$category = "keychain";
$itemimage = "keychain3.jpg";
$quantity = "3";
// product default data1 in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,Category, ItemImage, Quantity)VALUES (null,:name, :price,:description,:category, :itemimage, :quantity)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':itemimage', $itemimage);
$stmt->bindParam(':quantity', $quantity);
// linking all the data to table
$stmt->execute();


$name = "colorful doughnut plushy";
$price = "3.0";
$description = "description details for 4";
$category = "keychain";
$itemimage = "keychain1.jpg";
$quantity = "3";
// product default data1 in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,Category, ItemImage, Quantity)VALUES (null,:name, :price,:description,:category, :itemimage, :quantity)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':itemimage', $itemimage);
$stmt->bindParam(':quantity', $quantity);
// linking all the data to table
$stmt->execute();

$name = "blue green keychain";
$price = "3.0";
$description = "description details for 5";
$category = "keychain";
$itemimage = "promo5.jpg";
$quantity = "3";
// product default data1 in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,Category, ItemImage, Quantity)VALUES (null,:name, :price,:description,:category, :itemimage, :quantity)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':itemimage', $itemimage);
$stmt->bindParam(':quantity', $quantity);
// linking all the data to table
$stmt->execute();

$name = "pink yellow keychain";
$price = "3.0";
$description = "description details for 6";
$category = "keychain";
$itemimage = "promo6.jpg";
$quantity = "3";
// product default data1 in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,Category, ItemImage, Quantity)VALUES (null,:name, :price,:description,:category, :itemimage, :quantity)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':itemimage', $itemimage);
$stmt->bindParam(':quantity', $quantity);
// linking all the data to table
$stmt->execute();

$name = "double keychain";
$price = "3.0";
$description = "description details for 6";
$category = "keychain";
$itemimage = "promo7.jpg";
$quantity = "3";
// product default data1 in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,Category, ItemImage, Quantity)VALUES (null,:name, :price,:description,:category, :itemimage, :quantity)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':itemimage', $itemimage);
$stmt->bindParam(':quantity', $quantity);
// linking all the data to table
$stmt->execute();


?>