<?php
session_start();
include 'database.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $username;
        header("Location: home.php");
    } else {
        echo "<script>alert('Invalid login!');</script>";
    }
}
?>

<html>
<head>
    <title>Login - Tourism System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Tourism Management System</h1>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
</form>
</body>
</html>
