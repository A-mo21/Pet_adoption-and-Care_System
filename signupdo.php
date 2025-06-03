<?php
session_start();
include_once("db_connect.php");

$firstName = trim($_POST['first-name']);
$lastName = trim($_POST['last-name']);
$email = trim($_POST['email']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$rePassword = trim($_POST['re-password']);

if ($password !== $rePassword) {
    $_SESSION['error'] = "Passwords do not match!";
    header("Location: signup.php");
    exit();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO users (first_name, last_name, email, username, password) 
          VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($query);
$stmt->bind_param("sssss", $firstName, $lastName, $email, $username, $hashedPassword);

if ($stmt->execute()) {
    $_SESSION['success'] = "Signup successful! You can now log in.";
    header("Location: login.html");
} else {
    $_SESSION['error'] = "Signup failed. Please try again.";
    header("Location: signup.php");
}

$stmt->close();
$conn->close();
?>