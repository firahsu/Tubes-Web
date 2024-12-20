<?php
require_once 'db.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kategori = $_POST['kategori'];
    $nama_makanan = $_POST['nama_makanan'];
    $deskripsi = $_POST['deskripsi'];

    // Validasi file upload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/"; // Folder penyimpanan gambar
        $gambar_name = basename($_FILES['gambar']['name']);
        $target_file = $target_dir . $gambar_name;

        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            // Query untuk menambahkan data ke tabel makanan
            $stmt = $conn->prepare("INSERT INTO makanan (Kategori, NamaMakanan, Deskripsi, gambar) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $kategori, $nama_makanan, $deskripsi, $gambar_name);
            $stmt->execute();

            // Redirect ke halaman CRUD utama
            header("Location: CRUD-admin.php");
            exit;
        } else {
            echo "Error saat mengunggah gambar.";
        }
    } else {
        echo "Tidak ada file yang diunggah atau terjadi error pada file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data Makanan</title>
  <style>
    /* CSS Styling */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
    }

    body {
      background-color: #f4f1eb;
      color: #3e3b36;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 400px;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    h1 {
      text-align: center;
      color: #6f4f28;
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      color: #6f4f28;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      margin: 10px 0 20px 0;
      border: 2px solid #deb887;
      border-radius: 5px;
      background-color: #faf3e0;
      font-size: 16px;
      color: #3e3b36;
    }

    input[type="file"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0 20px 0;
      border: 2px solid #deb887;
      border-radius: 5px;
      background-color: #faf3e0;
      font-size: 16px;
      color: #3e3b36;
      cursor: pointer;
    }

    select {
      width: 100%;
      padding: 10px;
      margin: 10px 0 20px 0;
      border: 2px solid #deb887;
      border-radius: 5px;
      background-color: #faf3e0;
      font-size: 16px;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #6f4f28;
      color: #fff;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.2s;
    }

    button:hover {
      background-color: #8b5e3c;
      transform: scale(1.05);
    }

    a {
      display: block;
      text-align: center;
      margin-top: 15px;
      color: #6f4f28;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s;
    }

    a:hover {
      color: #8b5e3c;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Tambah Data Makanan</h1>
    <form method="POST" enctype="multipart/form-data">
      <label for="kategori">Kategori:</label>
      <select name="kategori" id="kategori" required>
        <option value="Makanan Tradisional">Makanan Tradisional</option>
        <option value="Makanan Cepat Saji">Makanan Cepat Saji</option>
        <option value="Menu Diet">Menu Diet</option>
        <option value="Dessert">Dessert</option>
      </select>

      <label for="nama_makanan">Nama Makanan:</label>
      <input type="text" id="nama_makanan" name="nama_makanan" required>

      <label for="deskripsi">Deskripsi:</label>
      <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea>

      <label for="gambar">Gambar:</label>
      <input type="file" id="gambar" name="gambar" accept="image/*" required>

      <button type="submit">Simpan</button>
    </form>
    <a href="CRUD-admin.php">Kembali</a>
  </div>
</body>
</html>
