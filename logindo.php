<?php
session_start();

include_once("db_connect.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$emailOrUsername = trim($_POST['email']);
$password = trim($_POST['password']);

$query = "SELECT * FROM users WHERE (email = ? OR username = ?)";
$stmt = $conn->prepare($query);

if (!$stmt) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}

$stmt->bind_param("ss", $emailOrUsername, $emailOrUsername);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['logged_in'] = true;

        setcookie("user_id", $user['id'], time() + (86400 * 30), "/");
        setcookie("username", $user['username'], time() + (86400 * 30), "/");
        setcookie("logged_in", true, time() + (86400 * 30), "/");

        header("Location: home.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid password!";
        header("Location: login.php");
        exit();
    }
} else {
    $_SESSION['error'] = "User not found!";
    header("Location: login.php");
    exit();
}

$stmt->close();
$conn->close();
?>