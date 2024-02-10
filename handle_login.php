<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_model.inc.php';
require_once 'includes/login_contr.inc.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (validate_credentials($username, $password)) {
        $_SESSION["user_username"] = $username;

        header("Location: index.php");
        exit(); 
    } else {
        $_SESSION["login_error"] = "Incorrect username or password.";
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}