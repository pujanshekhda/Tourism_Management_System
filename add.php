<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include 'database.php';

if (isset($_POST['add'])) {
    $destination = $_POST['destination'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];

    // ✅ Fixed table name from 'tourism_db' to 'tours'
    $sql = "INSERT INTO tours (destination, description, price, duration) 
            VALUES ('$destination', '$description', '$price', '$duration')";
    $conn->query($sql);
    header("Location: view.php");
}
?>

<html>
<head>
    <title>Add Tour</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Add New Tour</h1>
<form method="POST">
    <input type="text" name="destination" placeholder="Destination" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="number" name="price" step="0.01" placeholder="Price" required>
    <input type="text" name="duration" placeholder="Duration (e.g., 5 Days)" required>
    <button type="submit" name="add">Add Tour</button>
</form>
<a href="home.php">🔙 Back to Home</a>
</body>
</html>
