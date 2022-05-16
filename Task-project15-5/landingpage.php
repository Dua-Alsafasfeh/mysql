<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css ?v=<?php echo time(); ?>">
    <title>landing page</title>
</head>

<body>
    <!-- ----------------header---------- -->
    <header>
        <nav>
            <div id="logo"><img src="./images/logo.png" alt="logo"></div>
        </nav>
    </header>
    <!-- -------------------main--------- -->
    <main class="landmain">
        <div>
            <h2 class="midtext">Hello There!</h2>
        </div>
        <div>
            <h3 class="midtext">Automatic Identity verification which enable to verify your identity.</h3>
        </div>
        <div id="landimg">
            <img src="./images/landing.png">
        </div>
        <div class="qoute">
            <p id="qoute">“If you really have your own identity you’ll keep on doing what you think is really right for you, and you’ll also understand the next step you want to take.”-Helmut Lang
            </p>
        </div>
        <div class="btn">
            <button type="button" id="btn1"><a href="loginpage.php" style="color:#205375">Login</a></button>
            <button type="button" id="btn2"><a href="signup.php" style="color:#EFEFEF">Sign UP</a></button>
        </div>
    </main>
</body>

</html>