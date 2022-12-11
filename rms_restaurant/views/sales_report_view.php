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
    <title>Order History</title>
</head>

<body>
    <h2>Restaurant Management System</h2>
    <hr>
    <table>
        <tr>
            <td>
                <?php require "nav_view.php" ?>
            </td>
            <td>
                <pre>    </pre>
            </td>
            <td>
                <fieldset>
                    <legend>
                        <h2>Sales Report</h2>

                    </legend>

                    <?php
                    // Load Orders
                    $filename = "../models/orders.json";
                    $file = fopen($filename, 'r');

                    $all_orders = fread($file, filesize($filename));
                    $all_orders = json_decode($all_orders);

                    $totalOrder = 0;
                    $totalSale = 0;
                    foreach ($all_orders as $order) {
                        if ($order->orderedFrom === $_SESSION["seller_email"]) {
                            $totalOrder++;
                            $totalSale += $order->totalPrice;
                        }
                    }
                    echo "Total Orders: " . $totalOrder;
                    echo "<br>Total Sales: " . $totalSale . " BDT";
                    ?>
                </fieldset>
            </td>
        </tr>
    </table>


    <?php include "footer_view.php" ?>
</body>

</html>