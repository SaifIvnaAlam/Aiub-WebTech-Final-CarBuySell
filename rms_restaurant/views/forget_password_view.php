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
    <title>Forget Password</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/forget.js"></script>
</head>

<body>

    <div class='loginBg'>
        <div class='loginform'>
            <form action="../controllers/forget_password_controller.php" method="post" novalidate onsubmit="return handleForget(this);">

                <h1>Forget Password</h1> <br>


                <?php
                if (isset($_SESSION['global_msg']) && !empty($_SESSION['global_msg'])) {
                    echo "<p>" . $_SESSION['global_msg'] . "</p><br>";
                    $_SESSION['global_msg'] = '';
                }
                ?>


                <!-- Email -->
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="E-mail" id="email" value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "" ?>">
                <p class="error" id="femail_err"></p>
                <?php
                if (isset($_SESSION["email_err"]) && !empty($_SESSION["email_err"])) {
                    echo "<p class='error'>" . $_SESSION["email_err"] . "</p>";
                    $_SESSION["email_err"] = "";
                }
                ?>

                <!-- Security qus -->
                <br><label for="sq">Special Food</label>
                <input type="text" name="sq" id="sq" value="<?php echo isset($_SESSION["sq"]) ? $_SESSION["sq"] : "" ?>">
                <p class="error" id="fsq_err"></p>
                <?php
                if (isset($_SESSION["sq_err"]) && !empty($_SESSION["sq_err"])) {
                    echo "<p class='error'>" . $_SESSION["sq_err"] . "</p>";
                    $_SESSION["sq_err"] = "";
                }
                ?>

                <!-- Password -->
                <br><label for="password">Password</label>
                <input placeholder="Password" type="password" name="password" id="password" value="<?php echo isset($_SESSION["password"]) ? $_SESSION["password"] : "" ?>">
                <p class="error" id="fpass_err"></p>
                <?php
                if (isset($_SESSION["password_err"]) && !empty($_SESSION["password_err"])) {
                    echo "<p class='error'>" . $_SESSION["password_err"] . "</p>";
                    $_SESSION["password_err"] = "";
                }
                ?>

                <br><!-- Confirm Password -->
                <label for="cpassword">Confirm Password</label>
                <input placeholder="Confirm Password" type="password" name="cpassword" id="cpassword" value="<?php echo isset($_SESSION["cpassword"]) ? $_SESSION["cpassword"] : "" ?>">
                <p class="error" id="fcpass_err"></p>
                <?php
                if (isset($_SESSION["cpassword_err"]) && !empty($_SESSION["cpassword_err"])) {
                    echo "<p class='error'>" . $_SESSION["cpassword_err"] . "</p>";
                    $_SESSION["cpassword_err"] = "";
                }
                ?>

                <br><input class="button" type="submit" value="Change Password"><br>

                <p>
                    Already have an account? <a href="login_view.php">Login</a><br>
                    Don't have an account? <a href="signup_view.php">Sign Up</a>
                </p>
            </form>

            <div>
             
            </div>


        </div>
    </div>



</body>

</html>