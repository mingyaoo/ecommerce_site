
<?php
print_r($_POST);
include_once('connection.php');
array_map("htmlspecialchars", $_POST);

print_r($_FILES);


$stmt = $conn->prepare("INSERT INTO TblCategory (CategoryID,Category, ItemImage)VALUES (null,:categoryn,:Pic)");

$stmt->bindParam(':categoryn', $_POST["categoryname"]);
$stmt->bindParam(':Pic', $_FILES["piccy"]["name"]);
$stmt->execute();

$target_dir = "category/";
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



header('Location: storecategory.php');

?>

