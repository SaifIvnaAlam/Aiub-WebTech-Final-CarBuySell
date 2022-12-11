<?php

session_start();

if (isset($_COOKIE["seller_email"])) {
    $_SESSION["seller_email"] = $_COOKIE["seller_email"];
}

if (isset($_SESSION["seller_email"])) {
    header("Location: home_view.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/signup.js"></script>
    <title>Sign Up</title>
</head>

<body>
    <div class="loginBg">

        <div class="loginform">


            <form action="../controllers/signup_controller.php" method="post" novalidate onsubmit="return handleSignup(this);">

                <h1>Seller Sign Up</h1> <br>

            
                <label for="rname">Full Name</label>
                <input type="text" name="rname" id="rname" placeholder="Full Name" value="<?php echo isset($_SESSION["rname"]) ? $_SESSION["rname"] : "" ?>">
                <p class="error" id="srname_err"></p>
                <?php
                if (isset($_SESSION["rname_err"]) && !empty($_SESSION["rname_err"])) {
                    echo "<p class='error'>" . $_SESSION["rname_err"] . "</p>";
                    $_SESSION["rname_err"] = "";
                }
                ?>

                <!-- Email -->
                <br><label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="E-mail" value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "" ?>">
                <p class="error" id="semail_err"></p>
                <?php
                if (isset($_SESSION["email_err"]) && !empty($_SESSION["email_err"])) {
                    echo "<p class='error'>" . $_SESSION["email_err"] . "</p>";
                    $_SESSION["email_err"] = "";
                }
                ?>

                <!-- Password -->
                <br><label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" id="password" value="<?php echo isset($_SESSION["password"]) ? $_SESSION["password"] : "" ?>">
                <p class="error" id="spass_err"></p>
                <?php
                if (isset($_SESSION["password_err"]) && !empty($_SESSION["password_err"])) {
                    echo "<p class='error'>" . $_SESSION["password_err"] . "</p>";
                    $_SESSION["password_err"] = "";
                }
                ?>

                <!-- Confirm Password -->
                <br><label for="cpassword">Confirm Password</label>
                <input class="inputD" type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" value="<?php echo isset($_SESSION["cpassword"]) ? $_SESSION["cpassword"] : "" ?>">
                <p class="error" id="scpass_err"></p>
                <?php
                if (isset($_SESSION["cpassword_err"]) && !empty($_SESSION["cpassword_err"])) {
                    echo "<p class='error'>" . $_SESSION["cpassword_err"] . "</p>";
                    $_SESSION["cpassword_err"] = "";
                }
                ?>

               
                <br><input class="button" type="submit" value="Sign Up"><br>

                <p>
                    Already have an account? <a href="login_view.php">Login</a><br>
                    Forget your passowrd <a href="forget_password_view.php">Reset Now</a>
                </p>



            </form>

            <div>
               
            </div>

        </div>

    </div>


</body>

</html>