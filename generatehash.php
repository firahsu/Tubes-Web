<?php
// Ganti 'admin' dengan password asli Anda
$password = 'adminku';

// Generate hash untuk password
$hash = password_hash($password, PASSWORD_DEFAULT);

// Tampilkan hash
echo "Hash password untuk adminku adalah: " . $hash;
?>