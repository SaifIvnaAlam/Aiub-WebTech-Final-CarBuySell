<?php
session_start();

if (isset($_COOKIE["seller_email"])) {
    $_SESSION["seller_email"] = $_COOKIE["seller_email"];
}

if (!isset($_SESSION["seller_email"])) {
    header("Location: login_view.php");
}

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: food_items_view.php");
}
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "rms_restaurant", 3306);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, "SELECT id, name, price, image FROM foods WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);
mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $id, $name, $price, $image);
mysqli_stmt_fetch($stmt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/updatefood.js"></script>
    <title>Add Food Item</title>
</head>


<body>
    <?php require "nav_view.php" ?>
    <div class="loginBg" style="height: 90vh;">
        <div class="basicform">
            <form action="../controllers/update_food_controller.php" method="post" enctype="multipart/form-data" novalidate onsubmit="return handleUpdateFood(this);">

                <h1>Update Food Item</h1>

                <!-- food Name -->
                <label for="id">Car ID*</label><br>
                <input type="number" name="id" id="id" value="<?php echo $id ?>" readonly><br>

                <!-- food Name -->
                <label for="foodname">Food Name*</label><br>
                <input type="text" name="foodname" id="foodname" value="<?php echo $name ?>">
                <p class="error" id="upfoodname_err"></p>
                <?php
                if (isset($_SESSION["foodname_err"]) && !empty($_SESSION["foodname_err"])) {
                    echo "<em>" . $_SESSION["upfoodname_err"] . "</em>";
                    $_SESSION["foodname_err"] = "";
                }
                ?>
                <!-- food price -->
                <br><label for="price">Car Price*</label><br>
                <input type="number" name="price" id="price" value="<?php echo $price ?>">
                <p class="error" id="upfoodprice_err"></p>
                <?php
                if (isset($_SESSION["price_err"]) && !empty($_SESSION["price_err"])) {
                    echo "<em>" . $_SESSION["price_err"] . "</em>";
                    $_SESSION["price_err"] = "";
                }
                ?>

                <!-- Profile Image -->
                <br><label for="fimage">Food Image*</label><br>

                <input type="file" name="fimage" id="fimage">
                <p class="error" id="upfimage_err"></p>
                <?php
                if (isset($_SESSION["fimage_err"]) && !empty($_SESSION["fimage_err"])) {
                    echo "<em>" . $_SESSION["fimage_err"] . "</em>";
                    $_SESSION["fimage_err"] = "";
                }
                ?>

                <br><input class="button" type="submit" value="Update Food Item"><br>

            </form>
            <div>
               
            </div>
        </div>
    </div>



</body>


</html>