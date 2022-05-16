<?php
    include_once './config/connect.php';
    echo $servername ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $name = $_POST['name'];
        $email = $_POST['email'];
        $salary = $_POST['salary'];

        $sql = " INSERT INTO employee( name, email, salary)
        VALUES ('$name', '$email', '$salary');";

        if(mysqli_query($conn , $sql)){
            echo "new record created sucessfuly";
        }else{
            echo "error:".$sql."<br>".mysqli_error($conn);
        }
        
       $sqlupdate = "UPDATE employee SET salary = 1000 WHERE salary = 200;";
       mysqli_query($conn , $sqlupdate);

       $sqldel = "DELETE FROM employee WHERE name='bayan';";
       mysqli_query($conn , $sqldel);
       mysqli_close($conn);
    ?>
</body>
</html>