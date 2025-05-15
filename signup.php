<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if fields are not empty
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: index.php");
        exit();
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: index.php");
        exit();
    }

    // Check if username or email already exists
    $checkStmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $checkStmt->bind_param("ss", $username, $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        $_SESSION['error'] = "Username or email already exists.";
        header("Location: index.php");
        exit();
    }
    $checkStmt->close();

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if (!$stmt) {
        $_SESSION['error'] = "Database error: " . $conn->error;
        header("Location: index.php");
        exit();
    }

    // Use correct variable name: $hashedPassword
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registration successful! Please login.";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
        header("Location: index.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
