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
    <link rel="stylesheet" href="css/home.css">
    <title>Home - seller</title>
</head>

<body>
    <?php require "nav_view.php" ?>

    <section class="hero">

        <div>
            <h1>Discover <br> Restaurants <br>
                That deliver near You</h1> <br>
            <p>It is a long established fact that <br> a reader will be distracted by <br> the readable content of a page <br> when looking at it's layout.</p>

            <button  onclick="window.location.href='add_food_item_view.php'">Add new item</button>
        </div>
        <div>
        
        </div>



    </section>
    <?php include "footer_view.php" ?>


</body>

</html>