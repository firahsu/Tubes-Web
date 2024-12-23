<?php
session_start(); // Mulai session

// Hapus semua session
session_unset(); // Menghapus semua variabel session
session_destroy(); // Menghancurkan session

// Hapus cookie jika "Remember Me" digunakan
if (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '', time() - 3600, "/"); // Hapus cookie user_id
}
if (isset($_COOKIE['role'])) {
    setcookie('role', '', time() - 3600, "/"); // Hapus cookie role
}

// Tampilkan alert menggunakan JavaScript sebelum redirect
echo '<script>alert("Anda berhasil logout!"); window.location.href = "loginko.php";</script>';
exit;
?>