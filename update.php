<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include 'database.php';

if (!isset($_GET['id'])) {
    die("Invalid request");
}

$id = $_GET['id'];
$tour = $conn->query("SELECT * FROM tours WHERE id=$id")->fetch_assoc();

if (isset($_POST['update'])) {
    $destination = $_POST['destination'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];

    // ✅ Corrected table name from 'tourism_db' to 'tours'
    $conn->query("UPDATE tours SET destination='$destination', description='$description', price='$price', duration='$duration' WHERE id=$id");

    header("Location: view.php");
}
?>

<html>
<head>
    <title>Update Tour</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Update Tour</h1>
<form method="POST">
    <input type="text" name="destination" value="<?= $tour['destination'] ?>" required>
    <textarea name="description" required><?= $tour['description'] ?></textarea>
    <input type="number" name="price" step="0.01" value="<?= $tour['price'] ?>" required>
    <input type="text" name="duration" value="<?= $tour['duration'] ?>" required>
    <button type="submit" name="update">Update</button>
</form>
<a href="view.php">🔙 Back to Tour List</a>
</body>
</html>
