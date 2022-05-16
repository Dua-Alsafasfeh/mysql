<?php
session_start();
include './config/connection.php';
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
$admin = array('admin' => 'Duaa@gmail.com', 'adminpass' => 'Dd12345@');
if (isset($_POST['submitlogin'])) {
    $e = $_POST['elogin'];
    // echo $e;
    $p = $_POST['passlogin'];
    // echo $p;

    $sqllogin = "SELECT * FROM loginform ;";
    $result = mysqli_query($conn , $sqllogin);
    $result_check = mysqli_num_rows($result);

    if($result_check > 0){
        while ($row = mysqli_fetch_assoc($result)){
            if(($e == $row['email']) && ($p ==$row['password'])){
                header('location: welcomepage.php');
                $row['datelastlogin']= date("d-m-Y - h:i:sa");
            }else{
                $msg = "Invalid Login Details";
            }
        }
    }else{
        echo "invalid data";
    }

    //check admin
    if (($e == $admin['admin']) && ($p == $admin['adminpass'])) {
        header('location: admin.php');
    }
    // else{
    //     foreach($_SESSION["userdata"] as $key => $value){
    //         if( $e == $value['email'] && $p == $value['password']){
    //             $_SESSION['firstname']= $value['firstname'];
    //             $_SESSION['secondname']= $value['secondname'];
    //             $_SESSION['thirdname']= $value['thirdname'];
    //             $_SESSION['lastname']= $value['lastname'];
    //             $_SESSION['birthdate']= $value['birthdate'];
    //             $_SESSION['email']= $value['email'];
    //             $_SESSION['phone']= $value['phone'];
    //             $_SESSION['password']= $value['password'];
    //             $_SESSION['creationdate']= $value['creationdate'];
    //             $_SESSION['lastlogindate']= setCookie('lasttime', time(), time()+604800);;
    //             // $_SESSION['lastlogindate']= $value['lastlogindate'];

    //             header('location: welcomepage.php');
    //         }else{
    //             $msg = "Invalid Login Details";
    //         }
    //     }
    // } 



    // elseif (isset($_SESSION["email"]) && ($e == $_SESSION["email"]) && ($e!== $admin['admin']) && isset($_SESSION["password"]) && ($p == $_SESSION["password"]) && ($p !== $admin['adminpass'])) {
    //     header('location: welcomepage.php');
    // } else {
    //     $msg = "Invalid Login Details";
    // }
}
// session_unset();
?>

<!-- //////////////////////  HTML //////////////////////////////////// -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css ?v=<?php echo time(); ?>">
    <title>login page</title>
</head>

<body class="loginbody">
    <main class="loginmain">
        <div class="pop" id="pop">
            <div>
                <img src="./images/login.webp">
            </div>
            <div class="parent">
                <div class="loghead">
                    <h2>LOGIN</h2>
                    <p id="p2">Welcome back! Login With Your Credentials</p>
                </div>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                    <div class="inp">
                        <input type="email" id="email" placeholder="Email" name="elogin" class="iconmail" required>
                    </div>

                    <div class="inp">
                        <input type="password" id="password" placeholder="Password" class="iconpass" name="passlogin" required>
                    </div>
                    <p id="erroruser"><?php if (isset($msg)) {
                                            echo $msg;
                                        } ?></p>
                    <div class="butt">
                        <button type="submit" class="button" id="button" name="submitlogin">Login</button>
                    </div>
                    <div class="p2">
                        <p id="p2">Don't have an account ?<span class="bold"><a href="signup.php" style="color:#205375">Sign Up</a></span></p>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>