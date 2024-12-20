<?php
require_once 'db.php'; // Koneksi ke database

// Periksa apakah ID dikirim melalui parameter URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan ID
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect kembali ke halaman daftar user setelah berhasil menghapus
        header("Location: CRUD-admin.php?message=success_delete");
        exit;
    } else {
        echo "Error: Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>