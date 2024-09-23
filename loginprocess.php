
<?php
session_start();
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tblusers WHERE Email =:email AND type = 1;" );
$stmt->bindParam(':email', $_POST['email']);
$stmt->execute();

$backURL= "/ecommerce_site/login.php";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $hashed= $row['Password']; 
    $attempt= $_POST['pw'];
    if(password_verify($attempt,$hashed)){
        $_SESSION['name']=$row["Forename"];
        $_SESSION['loggedinid']=$row["UserID"];
        

        // //gets the current date NEEEEEEEEED TO FIX
        // $today = new DateTime();
        // $today1 = new DateTime();
        // $today1= $today1->format('Y-m-d');
        // $nextMonth = $today->modify('+1 month')->format('Y-m-d');
        // // modified the date
        // $stmt1 = $conn->prepare("INSERT INTO tblbasket (OrderNo,UserID,Date_bought, Delivery_date, Delivered, Paid)VALUES (null, :loggedinid, :datebought, :nextMonth, 0,0)");
        // $stmt1->bindParam(':loggedinid', $_SESSION['loggedinid']);
        // $stmt1->bindParam(':datebought', $today1);
        // $stmt1->bindParam(':nextMonth', $nextMonth);

        // //just need to change orderno
        // $stmt1->execute();
        // $conn=null;

        // $row1 = $conn->prepare("SELECT OrderNo FROM tblbasket WHERE UserID = :loggedinid");
        // $row1->bindParam(':loggedinid', $_SESSION['loggedinid']);
        // $_SESSION['orderno'] = $row1["OrderNo"];

        if (!isset($_SESSION['backURL'])){
            $backURL= "/ecommerce_site/homepage.php"; 
        }
        unset($_SESSION['backURL']);
        header('Location: ' . $backURL);
    }else{
        header('Location: login.php');
    }
}
header('Location: ' . $backURL);



$conn=null;
?>


