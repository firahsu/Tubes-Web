<?php
$servername = "localhost";
$username = "root";
$password = "";  // Biasanya kosong jika menggunakan Laragon
$dbname = "tubes";  // Ganti dengan nama database yang Anda gunakan

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>