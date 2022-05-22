<?php
session_start();
include './config/connection.php';
// $filename = 'landingpage.php';
// if (file_exists($filename)) {
//   $DCreated = date ("F d Y H:i:s.", filemtime($filename));
//   	// somefile.txt was last changed: December 29 2020 22:16:23.
// }
// $Dlastlogin = date ("H : i : s - d/m/y") .(60 * 24 * 60 * 60 + time());
?>
<!-- //////////////////////////////HTML///////////////////////////////////////// -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Admin page</title>
</head>

<body>
    <header>
        <nav>
            <div class="adminpic"><img src="./images/admin.jpg" alt="admin pic" id="adminpic"></div>
        </nav>
    </header>
    <main class="adminmain">
        <div class="adminmain1">
            <p id="welcpara">Welcome to Admin Page
            </p>
        </div>

        <div class="usercontaineradmin">
            <div>
                <img src="./images/adminicon.png" alt="admin icon" id="usericon">
            </div>
            <div>
                <table class="usertable">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Account Cration Date</th>
                        <th>Last Login Date</th>
                    </tr>
                    <?php
                    $sqladmin = "SELECT * FROM loginform ;";
                    $result = mysqli_query($conn , $sqladmin);
                    $result_check = mysqli_num_rows($result);

                    if($result_check > 0){
                        while($row = mysqli_fetch_assoc($result)){
                    $x =$row["id"];
                    echo "<tr>
                    <td>" . $x. "</td>
                    <td>" . $row["firstname"] . " " . $row["secondname"] . " " . $row["thirdname"] . " " . $row["lastname"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["password"] . "</td>
                    <td>" . $row["createdat"] . "</td>
                    <td>" . $row["datelastlogin"] . "</td>
                    <td>" ."<form method ='POST'>
                    <td>"."<input type='submit' value='Update' name='update'> <br>"."</td>
                    <td>"."<input type='submit' value='Delete' name='delete' deleteid='.$x'> <br>"."</td>
                    </form>" ."</td> 
                </tr>";

                // echo($value["email"]);
                        // $id++;
                        }
                    }
                    if(isset($_POST['delete'])){
                        $sqldel="SELECT * FROM loginform";
                        $id = $_POST['deleteid'];
                        $deletedata = "DELETE FROM loginform WHERE id=$id;";
                        $result=mysqli_query($conn,$deletedata);
                        if($result){
                            echo "deleted successfully";
                        }else{
                            die(mysqli_connect_error($conn));
                        }
                    }

                    if(isset($_post['update'])){
                        $row['firstname']= "<input type='submit' value='Update' name='update'>";
                    }
                //     foreach ($_SESSION["userdata"] as $value) {
                //         echo "<tr>
                //     <td>" . $id . "</td>
                //     <td>" . $value["firstname"] . " " . $value["secondname"] . " " . $value["thirdname"] . " " . $value["lasrname"] . "</td>
                //     <td>" . $value["email"] . "</td>
                //     <td>" . $value["password"] . "</td>
                //     <td>" . $value["creationdate"] . "</td>
                //     <td>" . $_SESSION["datelastlogin"] . "</td>
                // </tr>";
                // // echo($value["email"]);
                //         $id++;
                //     }
                    
                    ?>
                </table>
            </div>
        </div>
        <div class="logoutadmin">
            <button type="button" id="btn1"><a href="landingpage.php" style="color:#205375">Log out</a></button>
        </div>

        <button><a href=""></a>Updata</button>
        <button><a href=""></a>Delete</button>
    </main>
</body>
</html>

<!-- <input type='hidden' name='editid' value='".$row["id"]."'> -->
<!-- <input type='hidden' name='deleteid' value='".$row["id"]."'> -->
<!-- <td>" ."<form method ='post'>
                    <td>"."
                    <input type='submit' value='Delete' name='delete'> <br>"."</td>
                    </form>" ."</td> -->