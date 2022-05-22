<?php
session_start();
include './config/connection.php';
$sqlwelcome= "SELECT * FROM loginform;";
$result = mysqli_query($conn , $sqlwelcome);
$result_check = mysqli_num_rows($result);

if($result_check > 0){
    $row = mysqli_fetch_assoc($result);
    $fullname = $_SESSION['firstname']." " .$_SESSION["secondname"] ." " .$_SESSION["thirdname"] ." " .$_SESSION["lastname"];
    $birthdate =$_SESSION["birthdate"];
    $email =$_SESSION["email"];
    $phone =$_SESSION["phone"] ;

}



// if (isset($_SESSION["firstname"]) && isset($_SESSION["secondname"]) && isset($_SESSION["thirdname"]) && ($_SESSION["lasrname"])) {
//     $fullname = $_SESSION["firstname"]." " .$_SESSION["secondname"] ." " .$_SESSION["thirdname"] ." " .$_SESSION["lasrname"];
// }
// if(isset($_SESSION["birthdate"])){
//     $birthdate =$_SESSION["birthdate"];
// }
// if(isset($_SESSION["email"])){
//     $email =$_SESSION["email"];
// }
// if(isset($_SESSION["phone"])){
//     $phone =$_SESSION["phone"] ;
// }

?>

<!-- ///////////////////////////////////////  HTML /////////////////////////////////////// -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>welcome page</title>
</head>

<body>
    <header>
        <nav>
            <div class="welc"><img src="./images/welcome.png" alt="welcome pic" id="welc"></div>
        </nav>
    </header>

    <main class="welcmain">
        <div class="welcmain1">
            <p id="welcpara">Our cordial welcome goes to you! Thank you for trusting us and appreciating our venture!
            </p>
        </div>

        <div class="usercontainer">
            <div>
                <img src="./images/usericon.png" alt="user icon" id="usericon">
            </div>
            <div>
                <table class="usertable">
                    <tr>
                        <th>Full Name :</th>
                        <td> <?php if (isset($fullname)) {
                                    echo $fullname;
                                } ?> </td>
                    </tr>
                    <tr>
                        <th>Birth Date :</th>
                        <td> <?php if (isset($birthdate)) {
                                    echo $birthdate;
                                } ?> </td>
                    </tr>
                    <tr>
                        <th>E-mail :</th>
                        <td> <?php if (isset($email)) {
                                    echo $email;
                                } ?> </td>
                    </tr>
                    <tr>
                        <th>Mobile Number :</th>
                        <td> <?php if (isset($phone)) {
                                    echo $phone;
                                } ?> </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="logout">
        <button type="button" id="btn1" ><a href="landingpage.php" style="color:#205375">Log out</a></button>
        </div>
    </main>
</body>

</html>