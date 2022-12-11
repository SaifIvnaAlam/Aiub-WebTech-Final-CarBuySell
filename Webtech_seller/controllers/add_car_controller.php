<?php

session_start();

if (isset($_COOKIE["seller_email"])) {
    $_SESSION["seller_email"] = $_COOKIE["seller_email"];
}

if (!isset($_SESSION["seller_email"])) {
    header("Location: login_view.php");
}

$seller_email = $_SESSION["seller_email"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValid = true;

    $_SESSION["carname"] = $_POST["carname"];
    $_SESSION["price"] = $_POST["price"];
    $_SESSION["discription"] = $_POST["discription"];
    $image = "";


    
    if (empty($_POST["carname"])) {
        $_SESSION["carname_err"] = "Please enter you car name.";
        $isValid = false;
    }
    if (empty($_POST["discription"])) {
        $_SESSION["discription_err"] = "Please enter you car name.";
        $isValid = false;
    }

   
    if ($_POST["price"] <= 0) {
        $_SESSION["price_err"] = "Please enter a valid price.";
        $isValid = false;
    }

    if (isset($_FILES["fimage"]["name"])) {
        $source = $_FILES['fimage']['tmp_name'];
        $ext = explode(".", $_FILES['fimage']['name']);
        $ext = $ext[count($ext) - 1];
        $destination = '../images/' . $_POST["carname"] . '.' . $ext;
        move_uploaded_file($source, $destination);
        $image = $destination;
    }

    if ($isValid) {
        require '../models/cars.php';
        createNewPost($_POST["carname"], $_POST["price"], $_POST["discription"],$image, $seller_email);

        session_unset();
        $_SESSION["seller_email"] = $seller_email;

        header("Location: ../views/add_car_view.php");
    } else {
        header("Location: ../views/add_car_view.php");
    }
} else {

    header("Location: ../views/add_car_view.php");
}
