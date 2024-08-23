
<?php
include_once("connection.php");
array_map("htmlspecialchars", $_POST);

//connects all information towards my table

echo(loggedinid)
echo(cart)


//links all data to table
$stmt = $conn->prepare("INSERT INTO tblUsers (UserID,Email,Password,Forename,Surname,Address,Postcode, PhoneNo ,Type)VALUES (null,:email,:password,:forename,:surname,:address,:postcode, :phoneno,:role)");
$stmt->bindParam(':forename', $_POST["forename"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':email', $_POST["emailuser"]);
$stmt->bindParam(':address', $_POST["address"]);
$stmt->bindParam(':password', $hashed_password);
$stmt->bindParam(':postcode', $_POST["postcode"]);
$stmt->bindParam(':role', $role);
$stmt->bindParam(':phoneno', $_POST["phonenumber"]);
//fetches data from the sign up page
$stmt->execute();
$conn=null;


?>


