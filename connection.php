<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <?php
        $servername = 'localhost';
        $dbusername = 'root';
        $dbpass = '';
        $dbname = 'test';
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpass);
            // $db2 = "CREATE DATABASE $db"; 
            $sql = "INSERT INTO user_details(fname ,lname , gender , email , country)
        VALUES('Duaa' , 'Alsafasfeh' , 'female' , 'dua@gmail.com' , 'tafila' );";
            // $statement = $conn->prepare($sql);
            $conn->exec($sql); // use exec() because no results are returned

            $a = "UPDATE user_details SET fname= 'alaa' WHERE id=3 ";
            $conn->exec($a);

            $y = "DELETE FROM user_details WHERE id=2;";
            $conn->exec($y);

            $u = "SELECT fname FROM user_details;";
            echo $conn->exec($u);


            // $createtable = "CREATE TABLE details(
            //     id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            //     phone VARCHAR(20) NOT NULL);";
            // $conn->exec($createtable);

            //join tables
            foreach ($conn->query('SELECT user_details.fname, user_details.lname, phone 
        FROM user_details 
        INNER JOIN details
        ON user_details.id=details.id') as $row){

            echo "<tr>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['lname'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "</tr>";
        }

            echo "connect successfully";
        } catch (PDOException $err) {
            echo "ERROR:" . $err->getMessage() . "<br>";
            die();
        }
        ?>
    </table>
</body>
</html>