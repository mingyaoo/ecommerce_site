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
CategoryID INT(6) NOT NULL,
ItemImage VARCHAR(100) NOT NULL,
Quantity INT(6),
Promo INT(2))");
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


// fifth table for favourites
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblFavourites;
CREATE TABLE TblFavourites 
(UserID INT(6) NOT NULL,
ProductID INT(6) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();


// sixth table for favourites
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblCategory;
CREATE TABLE TblCategory 
(CategoryID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Category VARCHAR(100) NOT NULL,
ItemImage VARCHAR(100) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();


// seventh table for orders
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblOrders;
CREATE TABLE TblOrders 
(OrderNo INT(6) UNSIGNED FOREIGN KEY,
address1 VARCHAR(100) NOT NULL,
address2 VARCHAR(100) NOT NULL,
city VARCHAR(100) NOT NULL,
country VARCHAR(100) NOT NULL,
postcode INT(10) NOT NULL,
card number INT(16) NOT NULL,
expiry date VARCHAR(100) NOT NULL,
card holder name VARCHAR(100) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();


// ...............................................................................................

// inserting default data into the different tables

$catname = "keychain";
$itemimage = "keychaincat1.jpg";
$stmt = $conn->prepare("INSERT INTO TblCategory (CategoryID,Category,ItemImage)VALUES (null,:name, :itemimage)");
$stmt->bindParam(':name', $catname);
$stmt->bindParam(':itemimage', $itemimage);
// linking all the data to table
$stmt->execute();


$catname = "chains";
$itemimage = "category3.jpg";
$stmt = $conn->prepare("INSERT INTO TblCategory (CategoryID,Category,ItemImage)VALUES (null,:name, :itemimage)");
$stmt->bindParam(':name', $catname);
$stmt->bindParam(':itemimage', $itemimage);
// linking all the data to table
$stmt->execute();


$catname = "rocks";
$itemimage = "category2.jpg";
$stmt = $conn->prepare("INSERT INTO TblCategory (CategoryID,Category,ItemImage)VALUES (null,:name, :itemimage)");
$stmt->bindParam(':name', $catname);
$stmt->bindParam(':itemimage', $itemimage);
// linking all the data to table
$stmt->execute();


$catname = "bag";
$itemimage = "category4.jpg";
$stmt = $conn->prepare("INSERT INTO TblCategory (CategoryID,Category,ItemImage)VALUES (null,:name, :itemimage)");
$stmt->bindParam(':name', $catname);
$stmt->bindParam(':itemimage', $itemimage);
// linking all the data to table
$stmt->execute();


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
$image = "user1.jpg";

// admin default data in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblUsers (UserID,Email,Password,Forename,Surname, Address, Postcode, PhoneNo, Image, Type)VALUES (null,:email2,:password2,:forename2, :surname2, :address2, :postcode2, :phone2, :image, :role2)");
$stmt->bindParam(':email2', $email2);
$stmt->bindParam(':password2', $hashed_password2);
$stmt->bindParam(':forename2', $forename2);
$stmt->bindParam(':surname2', $surname2);
$stmt->bindParam(':address2', $address2);
$stmt->bindParam(':postcode2', $postcode2);
$stmt->bindParam(':phone2', $phoneno2);
$stmt->bindParam(':role2', $type2);
$stmt->bindParam(':image', $image);

// linking all the data to table
$stmt->execute();



$name = "Purple Single Plush Keychain";
$price = "5.0";
$description = "description details for one";
$category = "1";
$itemimage = "promo2.jpg";
$quantity = "3";
$promo = "1";
// product default data1 in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,CategoryID, ItemImage, Quantity, Promo)VALUES (null,:name, :price,:description,:category, :itemimage, :quantity, :promo)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':itemimage', $itemimage);
$stmt->bindParam(':quantity', $quantity);
$stmt->bindParam(':promo', $promo);
// linking all the data to table
$stmt->execute();


$name = "purple pink white keychain";
$price = "5.0";
$description = "description details for 2";
$category = "1";
$itemimage = "keychain4.jpg";
$quantity = "3";
$promo = "1";

// product default data1 in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,CategoryID, ItemImage, Quantity, Promo)VALUES (null,:name, :price,:description,:category, :itemimage, :quantity, :promo)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':itemimage', $itemimage);
$stmt->bindParam(':quantity', $quantity);
$stmt->bindParam(':promo', $promo);
// linking all the data to table
$stmt->execute();


$name = "turtle neck layered crochet";
$price = "6.0";
$description = "description details for 3";
$category = "1";
$itemimage = "keychain3.jpg";
$quantity = "3";
$promo = "1";

// product default data1 in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,CategoryID, ItemImage, Quantity, Promo)VALUES (null,:name, :price,:description,:category, :itemimage, :quantity, :promo)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':itemimage', $itemimage);
$stmt->bindParam(':quantity', $quantity);
$stmt->bindParam(':promo', $promo);
// linking all the data to table
$stmt->execute();


$name = "colorful doughnut plushy";
$price = "3.0";
$description = "description details for 4";
$category = "1";
$itemimage = "keychain1.jpg";
$quantity = "3";
$promo = "1";

// product default data1 in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,CategoryID, ItemImage, Quantity, Promo)VALUES (null,:name, :price,:description,:category, :itemimage, :quantity, :promo)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':itemimage', $itemimage);
$stmt->bindParam(':quantity', $quantity);
$stmt->bindParam(':promo', $promo);
// linking all the data to table
$stmt->execute();

$name = "blue green keychain";
$price = "3.0";
$description = "description details for 5";
$category = "1";
$itemimage = "promo5.jpg";
$quantity = "3";
$promo = "1";

// product default data1 in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,CategoryID, ItemImage, Quantity, Promo)VALUES (null,:name, :price,:description,:category, :itemimage, :quantity, :promo)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':itemimage', $itemimage);
$stmt->bindParam(':quantity', $quantity);
$stmt->bindParam(':promo', $promo);
// linking all the data to table
$stmt->execute();

$name = "pink yellow keychain";
$price = "3.0";
$description = "description details for 6";
$category = "1";
$itemimage = "promo6.jpg";
$quantity = "3";
$promo = "1";

// product default data1 in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,CategoryID, ItemImage, Quantity, Promo)VALUES (null,:name, :price,:description,:category, :itemimage, :quantity, :promo)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':itemimage', $itemimage);
$stmt->bindParam(':quantity', $quantity);
$stmt->bindParam(':promo', $promo);
// linking all the data to table
$stmt->execute();

$name = "double keychain";
$price = "3.0";
$description = "description details for 6";
$category = "1";
$itemimage = "promo7.jpg";
$quantity = "3";
$promo = "1";

// product default data1 in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,CategoryID, ItemImage, Quantity, Promo)VALUES (null,:name, :price,:description,:category, :itemimage, :quantity, :promo)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':itemimage', $itemimage);
$stmt->bindParam(':quantity', $quantity);
$stmt->bindParam(':promo', $promo);
// linking all the data to table
$stmt->execute();


$name = "triple keychain";
$price = "3.0";
$description = "description details for 7";
$category = "1";
$itemimage = "promotionproduct1.jpg";
$quantity = "3";
$promo = "1";

// product default data1 in order to input into tables
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,CategoryID, ItemImage, Quantity, Promo)VALUES (null,:name, :price,:description,:category, :itemimage, :quantity, :promo)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':itemimage', $itemimage);
$stmt->bindParam(':quantity', $quantity);
$stmt->bindParam(':promo', $promo);
// linking all the data to table
$stmt->execute();


?>