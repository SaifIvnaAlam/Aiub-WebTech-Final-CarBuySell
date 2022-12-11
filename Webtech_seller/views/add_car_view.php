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
    <script src="js/addcar.js"></script>
    <title>Add car for sell</title>
</head>


<body>
    <?php require "nav_view.php" ?>
    <div class="loginBg" style="height: 90vh;">
        <div class="basicform">
            <form action="../controllers/add_car_controller.php" method="post" enctype="multipart/form-data" novalidate onsubmit="return handleCars(this);">
                <h1>Please enter your car details</h1>

                <!-- food Name -->
                <label for="carname">Car Name*</label><br>
                <input type="text" name="carname" id="carname" value="<?php echo isset($_SESSION["carname"]) ? $_SESSION["carname"] : "" ?>">
                <p class="error" id="carname_err"></p>
                <?php
                if (isset($_SESSION["carname_err"]) && !empty($_SESSION["carname_err"])) {
                    echo "<em>" . $_SESSION["carname_err"] . "</em>";
                    $_SESSION["carname_err"] = "";
                }
                ?>

                <!-- food price -->
                <br><label for="price">Car Price*</label><br>
                <input type="number" name="price" id="price" value="<?php echo isset($_SESSION["price"]) ? $_SESSION["price"] : "" ?>">
                <p class="error" id="foodprice_err"></p>
                <?php
                if (isset($_SESSION["price_err"]) && !empty($_SESSION["price_err"])) {
                    echo "<em>" . $_SESSION["price_err"] . "</em>";
                    $_SESSION["price_err"] = "";
                }
                ?>
                <br><label for="discription">Discribe the car*</label><br>
                <input type="text" name="discription" id="discription" value="<?php echo isset($_SESSION["discription"]) ? $_SESSION["discription"] : "" ?>">
                <p class="error" id="cardiscription_err"></p>
                <?php
                if (isset($_SESSION["discription_err"]) && !empty($_SESSION["discription_err"])) {
                    echo "<em>" . $_SESSION["price_err"] . "</em>";
                    $_SESSION["discription_err"] = "";
                }
                ?>

                <!-- Profile Image -->
                <br><label for="fimage">Add Car Image*</label><br>

                <input type="file" name="fimage" id="fimage">
                <p class="error" id="fimage_err"></p>
                <?php
                if (isset($_SESSION["fimage_err"]) && !empty($_SESSION["fimage_err"])) {
                    echo "<em>" . $_SESSION["fimage_err"] . "</em>";
                    $_SESSION["fimage_err"] = "";
                }
                ?>

                <br><input class="button" type="submit" value="Add Food Item"><br>

            </form>
            <div>
                
            </div>
        </div>
    </div>



</body>


</html>