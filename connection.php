<?php
// setting variables which will be used to login to databases via XAMPP
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
// database name

try {
    // passing variables through in order to loog in to database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // if database is succesfull logged in, success message is returned
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    // vice versa, if it doesnt work then an eror message is sent
    }
?>