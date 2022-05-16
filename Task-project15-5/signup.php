<?php
session_start();
include './config/connection.php';
// $_SESSION["userdata"];
// if (empty($_SESSION["userdata"])) {
//     $_SESSION["userdata"] = [];
// }
$letters = "/^[A-Za-z]+$/";
$filter = "/([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";
$pwd_expression = "/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/";
$mobfilter = "/[0-9]{14}/";

$fErr = $sErr = $thErr = $lErr = $eErr = $dErr = $mErr = $pErr = $cpErr = '';

///check user name
if (isset($_POST['submit'])) {

    $dateOfBirth = $_POST["date"];
    $today = date("d-m-Y");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $age = $diff->format('%y');


    ////check first name
    if (!preg_match($letters, $_POST['first'])) {
        $fErr = "first Name must contain alphabet characters";
    }
    ////check second name
    elseif (!preg_match($letters, $_POST['second'])) {
        $sErr = "second Name must contain alphabet characters";
    }
    ////check third name
    elseif (!preg_match($letters, $_POST['third'])) {
        $thErr = "third Name must contain alphabet characters";
    }
    ////check last name
    elseif (!preg_match($letters, $_POST['last'])) {
        $lErr = "last Name must contain alphabet characters";
    }
    ////check birth date
    elseif ($age < 16) {
        $dErr = "you must be at least 16 years old";
    }
    ////check email
    elseif (!preg_match($filter, $_POST['email'])) {
        $eErr = "Email must be as : a@example.com";
    }
    //check email if exist
    // elseif (isset($_POST['email'])) {
    //     if(!empty($_SESSION["userdata"])) {
    //         foreach ($_SESSION["userdata"] as $key => $value) {
    //             if ($_POST['email'] == $value["email"]) {
    //                 $eErr = "Email already used";
    //                 break;
    //             }else {
    //                 $eErr ="ok";
    //             }
    //         }
    //     }
    // }
    ////check mobile number
    elseif (!preg_match($mobfilter, $_POST['mobile'])) {
        $mErr = "mobile number must contain 14 digits only";
    }
    ////check password
    elseif (!preg_match($pwd_expression, $_POST['pass'])) {
        $pErr = "Upper case, Lower case, Special character and Numeric letter are required in Password filed";
    }
    ////check confirm password
    elseif (($_POST['cpass']) !== ($_POST['pass'])) {
        $cpErr = "password not matched";
    } else {
        $DCreated = date("F d Y ");
        // $Dlastlogin = date("d/m/y - H:i:s ");

        $firstname = $_POST["first"];
        $secondname= $_POST["second"];
        $thirdname= $_POST["third"];
        $lasrname= $_POST["last"];
        $birthdate= $_POST["date"];
        $email= $_POST["email"];
        $phone= $_POST["mobile"];
        $password= $_POST["pass"];
        $confirmpassword= $_POST["cpass"];

        //store data in database 
        $sql = "INSERT INTO loginform(firstname , secondname , thirdname, lastname, birthdate, email, phone, password, createdat)
        VALUES ( '$firstname','$secondname', '$thirdname', '$lasrname','$birthdate', '$email','$phone', '$password', '$DCreated');";

        if(mysqli_query($conn , $sql)){
            header("location: loginpage.php");
        }else{
            echo "ERROR :" .$sql ."<br>" .mysqli_error($conn);
        }

        // $_SESSION["datelastlogin"] = $Dlastlogin;
        // $_SESSION["datecreation"] = $DCreated;
        // $_SESSION["firstname"] = $_POST["first"];
        // $_SESSION["secondname"] = $_POST["second"];
        // $_SESSION["thirdname"] = $_POST["third"];
        // $_SESSION["lasrname"] = $_POST["last"];
        // $_SESSION["birthdate"] = $_POST["date"];
        // $_SESSION["email"] = $_POST["email"];
        // $_SESSION["phone"] = $_POST["mobile"];
        // $_SESSION["password"] = $_POST["pass"];
        // $_SESSION["confirmpassword"] = $_POST["cpass"];

        // $arr = array(
        //     'firstname' => $_SESSION["firstname"],
        //     'secondname' => $_SESSION["secondname"],
        //     'thirdname' => $_SESSION["thirdname"],
        //     'lasrname' => $_SESSION["lasrname"],
        //     'birthdate' => $_SESSION["birthdate"],
        //     'email' => $_SESSION["email"],
        //     'phone' => $_SESSION["phone"],
        //     'password' => $_SESSION["password"],
        //     'creationdate' => $_SESSION["datecreation"],
        //     // 'lastlogindate' => $_SESSION["datelastlogin"]
        // );
        // array_push($_SESSION["userdata"], $arr);
        // print_r($_SESSION["userdata"]);
        
        // session_unset();
    }
}
?>

<!-- ///////////////////////////////////// HTML ////////////////////////////////////////////////-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>sign up page</title>
</head>

<body class="signupbody">
    <!-- ----------------header---------- -->
    <header>
        <nav>
            <div id="logo"><img src="./images/logo.png" alt="logo"></div>
        </nav>
    </header>
    <!-- -------------------main--------- -->
    <main class="signupmain">
        <div class="signupmain1">
            <div class="signuptable">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="regform" method="POST">
                    <table class="table" cellspacing="10">
                        <tr>
                            <td><label id="register">REGISTRATION</label> </td>
                            <td>
                                <hr>
                            </td>
                        </tr>
                        <!-- <tr class="row1"></tr> -->
                        <!-- //////////////////////////////First Name/////////////////////////////// -->
                        <tr>
                            <td class="label">
                                <label for="first">First Name:</label>
                            </td>
                            <td class="input">
                                <input type="text" id="first" class="first" name="first" value="<?php if (isset($_POST['first'])) {
                                                                                                    echo $_POST['first'];
                                                                                                } ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <div id="ferr"><?php if (isset($fErr)) {
                                                    echo $fErr;
                                                } ?>
                                </div>
                            </td>
                        </tr>
                        <!-- <tr class="row2"></tr> -->
                        <!-- ///////////////////////////Second Name////////////////////////////// -->
                        <tr>
                            <td class="label">
                                <label for="last">Second Name:</label>
                            </td>
                            <td class="input">
                                <input type="text" id="second" class="second" name="second" value="<?php if (isset($_POST['second'])) {
                                                                                                        echo $_POST['second'];
                                                                                                    } ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div id="serr"><?php if (isset($sErr)) {
                                                    echo $sErr;
                                                } ?></div>
                            </td>
                        </tr>
                        <!-- <tr class="row3"></tr> -->
                        <!-- ///////////////////////////Third Name//////////////////////////////// -->
                        <tr>
                            <td class="label">
                                <label for="third">Third Name:</label>
                            </td>
                            <td class="input">
                                <input type="text" id="third" class="third" name="third" value="<?php if (isset($_POST['third'])) {
                                                                                                    echo $_POST['third'];
                                                                                                } ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div id="therr"><?php if (isset($thErr)) {
                                                    echo $thErr;
                                                } ?></div>
                            </td>
                        </tr>
                        <!-- <tr class="row4"></tr> -->
                        <!-- /////////////////////////////Last Name//////////////////////////////// -->
                        <tr>
                            <td class="label">
                                <label for="last">Last Name:</label>
                            </td>
                            <td class="input">
                                <input type="text" id="last" class="last" name="last" value="<?php if (isset($_POST['last'])) {
                                                                                                    echo $_POST['last'];
                                                                                                } ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div id="lerr"><?php if (isset($lErr)) {
                                                    echo $lErr;
                                                } ?></div>
                            </td>
                        </tr>
                        <!-- <tr class="row5"></tr> -->
                        <!-- ////////////////////////////////Date of Birth/////////////////////////////////// -->
                        <tr>
                            <td class="label">
                                <label for="date">Date of Birth:</label>
                            </td>
                            <td class="input">
                                <input type="date" id="date" class="date" name="date" value="<?php if (isset($_POST['date'])) {
                                                                                                    echo $_POST['date'];
                                                                                                } ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <div id="derr"><?php if (isset($dErr)) {
                                                    echo $dErr;
                                                } ?></div>
                            </td>
                        </tr>
                        <!-- <tr class="row6"></tr> -->
                        <!-- //////////////////////////////Email/////////////////////////////////// -->
                        <tr>
                            <td class="label">
                                <label for="mail">Email:</label>
                            </td>
                            <td class="input">
                                <input type="email" id="mail" class="mail" name="email" value="<?php if (isset($_POST['email'])) {
                                                                                                    echo $_POST['email'];
                                                                                                } ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div id="merr"><?php if (isset($eErr)) {
                                                    echo $eErr;
                                                } ?></div>
                            </td>
                        </tr>
                        <!-- <tr class="row7"></tr> -->
                        <!--/////////////////////////////////Mobile Number////////////////////////////////////-->
                        <tr>
                            <td class="label">
                                <label for="mobile">Mobile Number:</label>
                            </td>
                            <td class="input">
                                <input type="text" id="mobile" class="mobile" name="mobile" value="<?php if (isset($_POST['mobile'])) {
                                                                                                        echo $_POST['mobile'];
                                                                                                    } ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div id="moberr"><?php if (isset($mErr)) {
                                                        echo $mErr;
                                                    } ?></div>
                            </td>
                        </tr>
                        <!-- <tr class="row8"></tr> -->
                        <!-- /////////////////////////////////Password/////////////////////////////////// -->
                        <tr>
                            <td class="label">
                                <label for="pass">Password:</label>
                            </td>
                            <td class="input">
                                <input type="password" id="pass" class="pass" name="pass" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div id="perr"><?php if (isset($pErr)) {
                                                    echo $pErr;
                                                } ?></div>
                            </td>
                        </tr>
                        <!-- <tr class="row9"></tr> -->
                        <!-- /////////////////////////////////Confirm Password////////////////////////////////// -->
                        <tr>
                            <td class="label">
                                <label for="cpass">Confirm Password:</label>
                            </td>
                            <td class="input">
                                <input type="password" id="cpass" class="cpass" name="cpass" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div id="cperr"><?php if (isset($cpErr)) {
                                                    echo $cpErr;
                                                } ?></div>
                            </td>
                        </tr>
                    </table>
                    <!--/////////////////////////////////////////////////////////////////////-->
                    <div class="btn3">
                        <button type="submit" id="btn3" name="submit">Sign UP</button>
                    </div>
                </form>
            </div>
            <div class="p1">
                <p id="p1">Already have an account ?<span class="bold"><a href="loginpage.php" style="color:#205375">Login</a></span></p>
            </div>
        </div>
    </main>
</body>

</html>