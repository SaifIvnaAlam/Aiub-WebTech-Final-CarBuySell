<?php

if (isset($_COOKIE["seller_email"])) {
    $_SESSION["seller_email"] = $_COOKIE["seller_email"];
}

session_start();
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
    <title>All Food Items</title>
</head>

<body>
    <?php require "nav_view.php" ?>

    <div class="foods_container">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "rms_restaurant", 3306);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);

        mysqli_stmt_prepare($stmt, "SELECT id, name, price,discription, image FROM foods WHERE remail = ?");
        mysqli_stmt_bind_param($stmt, "s", $_SESSION["seller_email"]);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $id, $name, $price, $discription, $image);

        while (mysqli_stmt_fetch($stmt)) {
            echo "<div class='fooditem'>";
            echo "<img src='$image'>";
            echo "<h3>$name</h3>";
            echo "<p>Price: $price BDT</p>";
            echo "<p>Discription: $discription BDT</p>";
            echo "<a href='update_food_item_view.php?id=$id'>Update car information</a>";
            echo "</div>";
        }


        ?>
    </div>


</body>

</html>