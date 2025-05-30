<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}
?>

<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Welcome, Admin!</h1>
<nav>
    <a href="add.php">➕ Add Tour</a>
    <a href="view.php">📋 View Tours</a>
    <a href="about.php">ℹ️ About</a>
    <a href="contact.php">📞 Contact</a>
    <a href="logout.php">🚪 Logout</a>
</nav>
</body>
</html>
