<?php
$serverName = "localhost";
$userName = "root";
$userPassword = ""; 
$dbname = "register";

try {
    $conn = new PDO
    ("mysql:host=$serverName;dbname=$dbname",$userName,$userPassword );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}
?>
