<?php
include 'db.php'; // Koneksi ke database

// Periksa apakah ID dikirim melalui parameter URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan ID
    $stmt = $conn->prepare("DELETE FROM makanan WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect kembali ke halaman CRUD setelah berhasil menghapus
        header("Location: CRUD-admin.php?message=success_delete");
        exit;
    } else {
        echo "Error: Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan.";
}

?>
