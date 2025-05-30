<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include 'database.php';
$tours = $conn->query("SELECT * FROM tours");
?>

<html>
<head>
    <title>View Tours</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Available Tours</h1>
<a href="add.php">➕ Add New Tour</a>
<table border="1"> 
    <tr>
        <th>Destination</th>
        <th>Description</th>
        <th>Price</th>
        <th>Duration</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $tours->fetch_assoc()): ?>
    <tr>
        <td><?= $row['destination'] ?></td>
        <td><?= $row['description'] ?></td>
        <td><?= $row['price'] ?></td>
        <td><?= $row['duration'] ?></td>
        <td>
            <a href="update.php?id=<?= $row['id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this tour?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
<a href="Home.php">🔙 Back to Home</a>
</body>
</html>
