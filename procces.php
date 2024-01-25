<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Proses autentikasi (contoh sederhana, bisa diganti dengan validasi sesuai kebutuhan)
    if ($username == "user" && $password == "password") {
        $_SESSION['username'] = $username; // Simpan username ke dalam session
        header("Location: topup.php"); // Redirect ke halaman topup.php
        exit();
    } else {
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="procces.css">
</head>
<body>
    <form action="" method="post">
        <h2>Login Form</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
