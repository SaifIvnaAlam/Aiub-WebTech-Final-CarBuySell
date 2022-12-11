<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="css/nav.css">
</head>

<body>


    <div class="fullnav">
        <div>
            <img class="logo" src="../images/logo.png" alt="" width="100px" height="100px">
        </div>

        <div class="navdesign">
            <li><a href="home_view.php">Home</a></li>
            <li><a href="profile_view.php">Profile</a></li>
            <li><a href="change_password_view.php">Change Password</a></li>

            <div class="dropdown">
                <p class="dropbtn">Sell</p>
                <div class="dropdown-content">
                    <li><a href="add_car_view.php">Add car for sell</a></li>
                    <li><a href="food_items_view.php">View sell history</a></li>
                </div>
            </div>
            



          
            <li><a href="../controllers/logout_controller.php">Logout</a></li>
        </div>

    </div>




</body>

</html>