<?php
$dbservername= 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname ='test1';

$connected = mysqli_connect($dbservername ,$dbusername,$dbpassword, $dbname);

// Check connection
if ($connected->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
?>