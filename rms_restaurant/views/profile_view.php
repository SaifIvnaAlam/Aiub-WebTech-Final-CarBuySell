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
    <script src="js/profile.js"></script>
    <title>Restaurant Profile</title>
</head>

<body>
    <?php require "nav_view.php" ?>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "rms_restaurant", 3306);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "SELECT id, rname, image, sq, address FROM restaurants WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $_SESSION["seller_email"]);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $id, $rname, $image, $sq, $address);
    mysqli_stmt_fetch($stmt);
    ?>

    <div class="profileBg">
        <div class="profileform">
            <h1>Restaurant Profile</h1>

            <div style="text-align:center">
                <img src="<?php echo $image ?>" alt="" width="140" height="140">
            </div>

            <?php
            if (isset($_SESSION['global_msg']) && !empty($_SESSION['global_msg'])) {
                echo "<p>" . $_SESSION['global_msg'] . "</p><br>";
                $_SESSION['global_msg'] = '';
            }
            ?>

            <form action="../controllers/profile_controller.php" method="post" enctype="multipart/form-data" novalidate id='profile_form' onsubmit="return profile(this);">

                <div>
                    <!-- Name -->
                    <label for="rname">Restaurant Name*</label><br>
                    <input type="text" name="rname" id="rname" value="<?php echo $rname ?>">
                    <p class="error" id="profile_rname_err"></p>
                </div>

                <div>
                    <!-- Email -->
                    <label for="email">Email*</label><br>
                    <input type="email" name="email" id="email" value="<?php echo $_SESSION["seller_email"] ?>" readonly>
                </div>

                <div>
                    <!-- SQ -->
                    <label for="sq">Special Item (SQ)*</label><br>
                    <input type="text" name="sq" id="sq" value="<?php echo $sq ?>">
                    <p class="error" id="profile_sq_err"></p>
                </div>

                <div>
                    <!-- Address -->
                    <label for="address">Address*</label><br>
                    <input type="text" name="address" id="address" value="<?php echo $address ?>">
                    <p class="error" id="profile_address_err"></p>
                </div>

                <div>
                    <label for="image">Profile Image</label>
                    <input type="file" name="image" id="image">
                    <input type="hidden" name="pimage" value="<?php echo $image ?>">
                </div>

                <div>
                    <br>
                    <input class="button" type="submit" value="Update Profile"><br><br>
                </div>

            </form>
        </div>
    </div>


    <?php include "footer_view.php" ?>
</body>

</html>