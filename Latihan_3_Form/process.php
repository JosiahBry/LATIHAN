<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "form_db";

// Koneksi ke MySQL tanpa database terlebih dahulu
$conn = new mysqli($host, $user, $password);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Buat database jika belum ada
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$conn->query($sql);

// Pilih database
$conn->select_db($dbname);

// Buat tabel jika belum ada
$sql = "CREATE TABLE IF NOT EXISTS kontak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pesan TEXT NOT NULL,
    waktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->query($sql);

// Proses data form jika ada
if ($_POST) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("INSERT INTO kontak (nama, email, pesan) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $pesan);

    if ($stmt->execute()) {
        echo "<div style='color: green; padding: 10px; margin: 10px; border: 1px solid green; background: #e8f5e8;'>Data berhasil dikirim!</div>";
    } else {
        echo "<div style='color: red; padding: 10px; margin: 10px; border: 1px solid red; background: #ffe8e8;'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Status Pengiriman</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Status Pengiriman</h2>
        <p><a href="index.html">Kembali ke Form</a></p>
    </div>
</body>
</html>
