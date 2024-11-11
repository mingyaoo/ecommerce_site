
<?php
print_r($_POST);
include_once('connection.php');
array_map("htmlspecialchars", $_POST);

print_r($_FILES);


$stmt = $conn->prepare("UPDATE TblProducts SET promo = 1 WHERE ProductID = :productid");

$stmt->bindParam(':productid', $_POST["productid"]);

$stmt->execute();



header('Location: adminportalmain.php');

?>


