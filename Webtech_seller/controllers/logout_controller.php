<?php

// Cookie Delete
setcookie("seller_email", "", time() - 3600, "/");
// unset($_COOKIE["restaurant_email"]);

// Session Destroy
session_start();
session_unset();
session_destroy();

header("Location: ../views/login_view.php");
