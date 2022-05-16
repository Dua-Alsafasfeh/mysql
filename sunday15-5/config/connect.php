<?php
    $servername = 'localhost';
    $dbusername = 'root';
    $password = '';
    $dbname = 'test1';

    //create connection 
    $conn = mysqli_connect($servername , $dbusername , $password , $dbname);

    //check connection 
    if (!$conn){
        die("connection failed".mysqli_connect_error());//output in string
    }else{
        echo "connected successfully";
    }

?>