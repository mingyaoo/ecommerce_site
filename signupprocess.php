
<?php
array_map("htmlspecialchars", $_POST);
include_once("connection.php");
//connects all information towards my table



//helps create a hashed password to maintain privacy and security for users
$hashed_password = password_hash($_POST["pwuser"], PASSWORD_DEFAULT);


//links all data to table
$stmt = $conn->prepare("INSERT INTO tblUsers (UserID,Email,Password,Forename,Surname,Address,Postcode, PhoneNo ,Image, Type)VALUES (null,:email,:password,:forename,:surname,:address,:postcode, :phoneno, :Pic, 1)");
$stmt->bindParam(':forename', $_POST["forename"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':email', $_POST["emailuser"]);
$stmt->bindParam(':address', $_POST["address"]);
$stmt->bindParam(':password', $hashed_password);
$stmt->bindParam(':postcode', $_POST["postcode"]);
$stmt->bindParam(':phoneno', $_POST["phonenumber"]);
$stmt->bindParam(':Pic', $_FILES["piccy"]["name"]);

//fetches data from the sign up page
$stmt->execute();
$conn=null;


$target_dir = "profilepic/";
print_r($_FILES);
$target_file = $target_dir . basename($_FILES["piccy"]["name"]);
echo $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (move_uploaded_file($_FILES["piccy"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["piccy"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }

header('Location: login.php');
?>


