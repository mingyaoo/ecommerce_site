
<?php
print_r($_POST);
include_once('connection.php');
array_map("htmlspecialchars", $_POST);

print_r($_FILES);


$stmt = $conn->prepare("DELETE FROM TblProducts WHERE ProductID = :productid");

$stmt->bindParam(':productid', $_POST["productid"]);

$stmt->execute();



header('Location: adminportalmain.php');

?>

