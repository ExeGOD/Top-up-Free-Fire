<?php
session_start();

// Cek apakah pengguna sudah login atau belum
if (!isset($_SESSION['username'])) {
    header("Location: procces.php"); // Redirect ke halaman login jika belum login
    exit();
}

// Ambil username dari session
$username = $_SESSION['username'];

// Deklarasikan variabel $topupMessage untuk menghindari kesalahan saat digunakan
$topupMessage = "";

// Ambil data nominal top up, metode pembayaran, email, dan nomor WhatsApp dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nominal"]) && isset($_POST["metode_pembayaran"]) && isset($_POST["email"]) && isset($_POST["nomor_whatsapp"])) {
    $nominal = $_POST["nominal"];
    $metode_pembayaran = $_POST["metode_pembayaran"];
    $email = $_POST["email"];
    $nomor_whatsapp = $_POST["nomor_whatsapp"];

    // Proses top up (contoh sederhana)
    // Di sini bisa ditambahkan logika atau pemrosesan sesuai dengan kebutuhan aplikasi
    $topupMessage = "Top up berhasil! Nominal: $nominal, Metode Pembayaran: $metode_pembayaran, Email: $email, Nomor WhatsApp: $nomor_whatsapp";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up Game</title>
    <link rel="stylesheet" href="topup.css">
</head>
<body>
    <h2>Selamat Datang</h2>
    
    <?php
    // Tampilkan pesan top up jika ada
    if (isset($topupMessage)) {
        echo "<p>$topupMessage</p>";
    }
    ?>

    <form action="topup.php" method="post">
        <h3>Top Up Game Free Fire</h3>
        <label for="uid">UID Game:</label>
        <input type="text" id="uid" name="uid" required><br>
        
        <label for="nominal">Nominal Top Up:</label>
        <select id="nominal" name="nominal" required>
            <option value="5.000">Rp 5,000 = 35 Diamond</option>
            <option value="10.000">Rp 10,000 = 75 Diamond</option>
            <option value="20.000">Rp 20,000 = 140 Diamond</option>
            <option value="30.000">Rp 30,000 = 210 Diamond</option>
            <option value="50.000">Rp 50,000 = 350 Diamond</option>
            <option value="70.000">Rp 70,000 = 635 Diamond</option>
            <option value="80.000">Rp 80,000 = 710 Diamond</option>
            <option value="100.000">Rp 100,000 = 920 Diamond</option>
            <option value="135.000">Rp 135,000 = 1200 Diamond</option>
        </select><br>

        <label for="metode_pembayaran">Metode Pembayaran:</label>
        <select id="metode_pembayaran" name="metode_pembayaran" required>
            <option value="transfer_bank">Transfer Bank</option>
            <option value="gopay">GoPay</option>
            <option value="ovo">OVO</option>
            <option value="ovo">Dana</option>
            <option value="ovo">Qris</option>
            <option value="ovo">Alfamart</option>
            <option value="ovo">Indomart</option>
        </select><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="nomor_whatsapp">Nomor WhatsApp:</label>
        <input type="tel" id="nomor_whatsapp" name="nomor_whatsapp" pattern="[0-9]{9,15}" required><br>
        
        <input type="submit" value="Top Up">
    </form>
    <br>
    <a href="procces.php">Logout</a> 
</body>
</html>
