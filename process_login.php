<?php
include 'includes/db.php';
include 'includes/functions.php';

$username = $_POST['username'];
$password = $_POST['password'];

session_start();

if (check_login($conn, $username, $password)) {
    $_SESSION['logged_in'] = true;
    $_SESSION['message'] = "Login successful!";
    $_SESSION['message_type'] = "success";
    header("Location: dashboard.php");
} else {
    $_SESSION['message'] = "Invalid credentials.";
    $_SESSION['message_type'] = "error";
    header("Location: login.php");
}
?>