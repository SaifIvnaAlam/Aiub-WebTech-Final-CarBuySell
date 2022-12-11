<?php

session_start();

if (isset($_COOKIE["seller_email"])) {
    $_SESSION["seller_email"] = $_COOKIE["seller_email"];
}

if (isset($_SESSION["seller_email"])) {
    header("Location: home_view.php");
}

require '../models/restaurant.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValid = true;

    $_SESSION["sq"] = $_POST["sq"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["password"] = $_POST["password"];
    $_SESSION["cpassword"] = $_POST["cpassword"];


    // Email Validation
    if (empty($_POST["email"])) {

        $_SESSION["email_err"] = "Please enter your email.";
        $isValid = false;
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

        $_SESSION["email_err"] = "Please enter a valid email.";
        $isValid = false;
    } else if (!restaurantExist($_POST['email'])) {

        $_SESSION["email_err"] = "No Account Found.";
        $isValid = false;
    }

    // Security Question Validation
    if (empty($_POST["sq"])) {

        $_SESSION["sq_err"] = "Please enter your favorite word.";
        $isValid = false;
    } else if (!checkSQ($_POST["email"], $_POST["sq"])) {
        $_SESSION["sq_err"] = "Incorrect Answer.";
        $isValid = false;
    }

    // Password Validation
    if (empty($_POST["password"])) {

        $_SESSION["password_err"] = "Please enter a password.";
        $isValid = false;
    }

    // Confirm Password Validation
    if (empty($_POST["cpassword"])) {

        $_SESSION["cpassword_err"] = "Please re-enter your password.";
        $isValid = false;
    } else if ($_POST["password"] != $_POST["cpassword"]) {

        $_SESSION["cpassword_err"] = "Password doesn't match.";
        $isValid = false;
    }


    if ($isValid) {
        updatePassword($_POST["email"], $_POST["password"]);

        session_unset();
        $_SESSION["global_msg"] = "Password Changed Successfully.";

        header("Location: ../views/forget_password_view.php");
    } else {
        header("Location: ../views/forget_password_view.php");
    }
} else {

    header("Location: ../views/forget_password_view.php");
}
