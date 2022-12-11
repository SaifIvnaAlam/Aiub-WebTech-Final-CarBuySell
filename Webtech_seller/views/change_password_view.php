<?php
session_start();

if (isset($_COOKIE["seller_email"])) {
    $_SESSION["seller_email"] = $_COOKIE["seller_email"];
}

if (!isset($_SESSION["seller_email"])) {
    header("Location: login_view.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/change_pass.js"></script>
    <title>Restaurant Change Password</title>
</head>

<body>
    <?php require "nav_view.php" ?>

    <div class="loginBg" style="height: 90vh ;">
        <div class="loginform">

            <form action="../controllers/change_password_controller.php" method="post" novalidate onsubmit="return handleChangePass(this);">

                <h1>Change Password</h1> <br>

                <?php
                if (isset($_SESSION['global_msg']) && !empty($_SESSION['global_msg'])) {
                    echo "<p>" . $_SESSION['global_msg'] . "</p><br>";
                    $_SESSION['global_msg'] = '';
                }
                ?>

                <!-- Current Password -->
                <br><label for="curr_password"> Current Password</label>
                <input type="password" name="curr_password" placeholder="Current Password" id="curr_password" value="<?php echo isset($_SESSION["curr_password"]) ? $_SESSION["curr_password"] : "" ?>">
                <p class="error" id="cp_cpass_err"></p>
                <?php
                if (isset($_SESSION["curr_password_err"]) && !empty($_SESSION["curr_password_err"])) {
                    echo "<p class='error'>" . $_SESSION["curr_password_err"] . "</p>";
                    $_SESSION["curr_password_err"] = "";
                }
                ?>

                <!-- New Password -->
                <br><label for="new_password"> New Password</label>
                <input class="inputD" type="password" name="new_password" placeholder="New-Password" id="new_password" value="<?php echo isset($_SESSION["new_password"]) ? $_SESSION["new_password"] : "" ?>">
                <p class="error" id="cp_npass_err"></p>
                <?php
                if (isset($_SESSION["new_password_err"]) && !empty($_SESSION["new_password_err"])) {
                    echo "<p class='error'>" . $_SESSION["new_password_err"] . "</p>";
                    $_SESSION["new_password_err"] = "";
                }
                ?>

                <!-- Confrim New Password -->
                <br><label for="cnew_password">Confirm New Password</label>
                <input type="password" placeholder="Confirm - New Password" name="cnew_password" id="cnew_password" value="<?php echo isset($_SESSION["cnew_password"]) ? $_SESSION["cnew_password"] : "" ?>">
                <p class="error" id="cp_cnpass_err"></p>
                <?php
                if (isset($_SESSION["cnew_password_err"]) && !empty($_SESSION["cnew_password_err"])) {
                    echo "<p class='error'>" . $_SESSION["cnew_password_err"] . "</p>";
                    $_SESSION["cnew_password_err"] = "";
                }
                ?>

                <br><input class="button" type="submit" value="Change Password"><br>

            </form>

            <div>
            </div>


        </div>
    </div>





</body>

</html>