<?php
session_start();
if (!isset($_SESSION["seller_email"])) {
    header("Location: ../views/login_view.php");
}

$seller_email = $_SESSION["seller_email"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValid = true;
    $rname = $_POST["rname"];
    $sq = $_POST["sq"];
    $address = $_POST["address"];
    $image = $_POST["pimage"];

    if (empty($rname)) {
        $_SESSION["rname_err"] = "Please enter your first name.";
        $isValid = false;
    }

    if (empty($sq)) {
        $_SESSION["sq_err"] = "Please enter your favorite word.";
        $isValid = false;
    }

    if (empty($address)) {
        $_SESSION["address_err"] = "Please enter your address.";
        $isValid = false;
    }

    if (!empty($_FILES["image"]["name"])) {
        $source = $_FILES['image']['tmp_name'];
        $ext = explode(".", $_FILES['image']['name']);
        $ext = $ext[count($ext) - 1];
        $destination = '../images/' . $name . '.' . $ext;
        move_uploaded_file($source, $destination);
        $image = $destination;
    }


    if ($isValid) {
        require '../models/restaurant.php';
        updateProfile($rname, $sq, $address, $image, $seller_email);

        $_SESSION["global_msg"] = "Profile Updated Successfully.";
        header("Location: ../views/profile_view.php");
    } else {
        header("Location: ../views/profile_view.php");
    }
} else {
    //

    header("Location: ../views/profile_view.php");
}
