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
            <h1>Get the best price <br>For your used <br>
              Car</h1> <br>

            <button  onclick="window.location.href='add_car_view.php'">Add new item</button>
        </div>
        <div>
        
        </div>



    </section>



</body>

</html>