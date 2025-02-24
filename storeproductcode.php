
<?php
print_r($_POST);
include_once('connection.php');
array_map("htmlspecialchars", $_POST);

// sql to input information regarding product information
$stmt = $conn->prepare("INSERT INTO TblProducts (ProductID,ProductName,Price,Description,CategoryID, ItemImage, Quantity)VALUES (null,:productn,:price,:description,:category,:Pic,:quantity)");

$stmt->bindParam(':productn', $_POST["productname"]);
$stmt->bindParam(':price', $_POST["price"]);
$stmt->bindParam(':description', $_POST["descrip"]);
$stmt->bindParam(':quantity', $_POST["quant"]);
$stmt->bindParam(':category', $_POST["category"]);
$stmt->bindParam(':Pic', $_FILES["piccy"]["name"]);
$stmt->execute();

// code for images and to add images to a folder 
$target_dir = "images/";
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



header('Location: storeproduct.php');

?>

