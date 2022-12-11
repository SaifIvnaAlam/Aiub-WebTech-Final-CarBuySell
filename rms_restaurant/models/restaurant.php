<?php

function loginCredentials($email, $password)
{
    $conn = mysqli_connect("localhost", "root", "", "rms_restaurant", );

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "SELECT id FROM restaurants WHERE email = ? and password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $id);
    mysqli_stmt_fetch($stmt);

    return isset($id);
}

function sellerExist($email)
{
    $conn = mysqli_connect("localhost", "root", "", "rms_restaurant", );

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "SELECT id FROM restaurants WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $id);
    mysqli_stmt_fetch($stmt);

    return isset($id);
}

function createNewSeller($rname, $email, $password)
{
    $conn = mysqli_connect("localhost", "root", "", "rms_restaurant", );

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "INSERT INTO restaurants(rname, email, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $rname, $email, $password);
    mysqli_stmt_execute($stmt);
}

function checkSQ($email, $sq)
{
    $conn = mysqli_connect("localhost", "root", "", "rms_restaurant", );

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "SELECT id FROM restaurants WHERE email = ? and sq = ?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $sq);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $id);
    mysqli_stmt_fetch($stmt);

    return isset($id);
}

function updatePassword($email, $password)
{
    $conn = mysqli_connect("localhost", "root", "", "rms_restaurant", );

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "UPDATE restaurants SET password = ? WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "ss", $password, $email);
    mysqli_stmt_execute($stmt);
}

function updateProfile($rname, $sq, $address, $image, $email)
{
    $conn = mysqli_connect("localhost", "root", "", "rms_restaurant", );

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "UPDATE restaurants SET rname = ?, sq = ?, address = ?, image = ? WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "sssss", $rname, $sq, $address, $image, $email);
    mysqli_stmt_execute($stmt);
}
