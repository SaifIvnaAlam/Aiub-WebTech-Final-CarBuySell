<?php

session_start();

if (isset($_COOKIE["seller_email"])) {
    $_SESSION["seller_email"] = $_COOKIE["seller_email"];
}

if (isset($_SESSION["seller_email"])) {
    header("Location: home_view.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValid = true;

    // Store Values in Session
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["password"] = $_POST["password"];

    // Email Validation
    if (empty($_POST["email"])) {

        $_SESSION["email_err"] = "Please enter your email.";
        $isValid = false;
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

        $_SESSION["email_err"] = "Please enter a valid email.";
        $isValid = false;
    }


    // Password Validation
    if (empty($_POST["password"])) {

        $_SESSION["password_err"] = "Please enter your password.";
        $isValid = false;
    }


    if ($isValid) {

        require '../models/restaurant.php';

        if (loginCredentials($_POST["email"], $_POST["password"])) {
            session_unset();
            $_SESSION["seller_email"] = $_POST["email"];
            setcookie("seller_email", $_POST["email"], time() + (86400 * 30), "/");

            setcookie("seller_login", "", time() - 3600, "/");
            header("Location: ../views/home_view.php");
        } else {
            if (isset($_COOKIE['seller_login']) && !empty($_COOKIE['seller_login'])) {
                $value = (int)$_COOKIE['seller_login'];
                setcookie("seller_login",  $value + 1, time() + (60), "/");
            } else {
                setcookie("seller_login", 1, time() + (60), "/");
            }

            $_SESSION["email_err"] = "Incorrect Email or Password.";
            header("Location: ../views/login_view.php");
        }
    } else {
        header("Location: ../views/login_view.php");
    }
} else {
    header("Location: ../views/login_view.php");
}
