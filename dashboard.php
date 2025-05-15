<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
    <p>This is your dashboard.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
