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
    <title>Log In</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/login.js"></script>
</head>

<body>
    <div class='loginBg'>
        <div class='loginform'>

            <form action="../controllers/login_controller.php" method="post" novalidate onsubmit="return loginCredentials(this);">
                <?php
                if (isset($_COOKIE['seller_login']) && !empty($_COOKIE['seller_login'])) {
                    $cooke_value = (int)$_COOKIE['seller_login'];
                    if ($cooke_value >= 3) {
                        echo "<p class='error'>Too many incorrect attemps. Please try again later.</p>";
                        die();
                    }
                }
                ?>
                <h1>Welcome Back Goraghari</h1>



                <!-- Email Input -->
                <br><label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="E-mail" value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "" ?>">
                <p class="error" id="email_err"></p>
                <!-- Email Error -->
                <?php
                if (isset($_SESSION["email_err"]) && !empty($_SESSION["email_err"])) {
                    echo "<p class='error'>" . $_SESSION["email_err"] . "</p>";
                    $_SESSION["email_err"] = "";
                }
                ?>

                <!-- Password Input -->
                <br><label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" value="<?php echo isset($_SESSION["password"]) ? $_SESSION["password"] : "" ?>">
                <p class="error" id="pass_err"></p>
                <!-- Password Error -->
                <?php
                if (isset($_SESSION["password_err"]) && !empty($_SESSION["password_err"])) {
                    echo "<p class='error'>" . $_SESSION["password_err"] . "</p>";
                    $_SESSION["password_err"] = "";
                }
                ?>

                <div class="forget">
                    <div>
                        <input type="checkbox" id="rememberme" name="Remenberme" value="Remenber me">
                        <label id="remember"> Remeber me</label>

                    </div>
                    <div>
                        <a href="forget_password_view.php">Forget Password</a>
                    </div>
                </div> <br>

                <!-- Login Button -->
                <input class="button" type="submit" value="Login"><br>

                <p>
                    Don't have an account? <a href="signup_view.php">Sign Up</a><br>
                </p>
               
            </form>

            <div>
            </div>
        </div>

    </div>
</body>


</html>