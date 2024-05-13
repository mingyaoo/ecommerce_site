
<?php
array_map("htmlspecialchars", $_POST);
include_once("connection.php");
//connects all information towards my table

// puts the values of admin and users into numbers so that i can put values into my table
switch($_POST["role"]){
	case "Admin":
		$role=0;
		break;
	case "User":
		$role=1;
		break;
}

//helps create a hashed password to maintain privacy and security for users
$hashed_password = password_hash($_POST["pwuser"], PASSWORD_DEFAULT);


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


header('Location: signup.php');
?>


