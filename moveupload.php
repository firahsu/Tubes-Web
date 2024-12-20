<?php
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true); // Buat folder jika tidak ada
}

if (isset($_FILES['file'])) {
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_name = $_FILES['file']['name'];
    $target_file = $target_dir . $file_name;

    if (move_uploaded_file($file_tmp, $target_file)) {
        echo "File berhasil dipindahkan ke " . $target_file;
    } else {
        echo "Gagal memindahkan file. Cek konfigurasi PHP dan izin folder.";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        Pilih File: <input type="file" name="file">
        <button type="submit">Upload</button>
    </form>
</body>
</html>
