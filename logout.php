
<?php
session_start();
include_once("connection.php");

print_r($_SESSION);

if(isset($_SESSION['name']))
{
    $stmt = $conn->prepare("SELECT COUNT(*) FROM tblbasketcontent WHERE OrderNo=:orderno");
    $stmt->bindParam(':orderno', $_SESSION['orderno']);
    $stmt->execute();
    $number_of_rows = $stmt->fetchColumn();
    echo($number_of_rows);
    if($number_of_rows == 0){
        $stmt = $conn->prepare("DELETE FROM tblbasket WHERE OrderNo=:orderno");
        $stmt->bindParam(':orderno', $_SESSION['orderno']);
        $stmt->execute();
    }
}
session_destroy();
header("Location: homepage.php");
?>
