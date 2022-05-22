<?php
$servername = 'localhost';
$dbusername = 'root';
$dbpass = '';
$dbname = 'empapp';

//create connection 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect($servername , $dbusername , $password , $dbname);
//check connection 
try{
    $pdo = new PDO("mysql:host=".$servername.";dbname=".$dbname, $dbusername, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>