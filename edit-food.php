<?php
require_once 'db.php'; // Koneksi ke database

// Inisialisasi variabel makanan dengan nilai default
$makanan = [
    'id' => '',
    'Kategori' => '',
    'NamaMakanan' => '',
    'Deskripsi' => '',
    'gambar' => ''
];

// Cek apakah ada ID makanan yang dikirimkan melalui URL
if (isset($_GET['id'])) {
    $id_makanan = $_GET['id'];

    // Ambil data makanan berdasarkan ID
    $query = "SELECT * FROM makanan WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_makanan);
    $stmt->execute();
    $result = $stmt->get_result();

    // Pastikan data ditemukan
    if ($result->num_rows > 0) {
        $makanan = $result->fetch_assoc();
    } else {
        die("Data makanan tidak ditemukan.");
    }
}

// Proses form submit untuk mengupdate data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $kategori = $_POST['kategori'];
    $nama_makanan = $_POST['nama_makanan'];
    $deskripsi = $_POST['deskripsi'];

    // Proses gambar jika diupload
    $gambar = $makanan['gambar']; // Menggunakan gambar lama jika tidak ada gambar baru
    if (!empty($_FILES['gambar']['name'])) {
        // Proses upload gambar baru
        $gambar = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $gambar);
    }

    // Update data makanan ke database
    $update_query = "UPDATE makanan SET Kategori = ?, NamaMakanan = ?, Deskripsi = ?, gambar = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssssi", $kategori, $nama_makanan, $deskripsi, $gambar, $id_makanan);
    if ($stmt->execute()) {
        header("Location: CRUD-admin.php"); // Redirect ke halaman admin setelah berhasil
        exit;
    } else {
        die("Error: " . $conn->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Makanan</title>
 <style>
  /* Reset dan Global Style */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  html, body {
    height: 100%;
    display: flex;
    flex-direction: column;
    font-family: 'Arial', sans-serif;
    background-color: #f4f1eb;
    color: #3e3b36;
  }

  /* Header */
  header {
    background-color: #6f4f28;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 30px;
    position: relative;
  }

  header .title {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    font-size: 32px;
    font-weight: bold;
  }

  .navbar {
    display: flex;
    gap: 20px;
  }

  .navbar a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    transition: color 0.3s ease;
  }

  .navbar a:hover {
    color: #deb887;
  }

  /* Form Styling */
  form {
    width: 50%;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
  }

  form input[type="text"],
  form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
  }

  form input[type="file"] {
    margin-bottom: 15px;
  }

  form button {
    display: block;
    margin: 0 auto;
    padding: 10px 20px;
    background-color: #6f4f28;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  form button:hover {
    background-color: #5a3e1f;
  }

  /* Tabel */
  table {
    width: 80%;
    margin: 30px auto;
    border-collapse: collapse;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
  }

  th {
    background-color: #6f4f28;
    color: white;
  }

  img {
    width: 100px;
    height: auto;
    border-radius: 5px;
  }

  /* Tombol */
  .btn {
    padding: 6px 12px;
    margin-right: 5px;
    border: none;
    color: white;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    text-align: center;
  }

  .btn-warning {
    background-color: #deb887;
    color: #3e3b36;
  }

  .btn-danger {
    background-color: #d2691e;
  }

  /* Footer */
  footer {
    background-color: #6f4f28;
    color: white;
    text-align: center;
    padding: 10px 0;
    margin-top: auto;
  }
</style>

</head>
<body>
  <header>
    <div class="title">Edit Data Makanan</div>
    <nav class="navbar">
      <a href="admin.php">Kembali</a>
    </nav>
  </header>

  <h2><?= htmlspecialchars($makanan['NamaMakanan']) ?></h2>
  <form action="edit-food.php?id=<?= $makanan['id'] ?>" method="POST" enctype="multipart/form-data">
    <label for="kategori">Kategori:</label><br>
    <input type="text" id="kategori" name="kategori" value="<?= htmlspecialchars($makanan['Kategori']) ?>" required><br><br>

    <label for="nama_makanan">Nama Makanan:</label><br>
    <input type="text" id="nama_makanan" name="nama_makanan" value="<?= htmlspecialchars($makanan['NamaMakanan']) ?>" required><br><br>

    <label for="deskripsi">Deskripsi:</label><br>
    <textarea id="deskripsi" name="deskripsi" rows="4" cols="50" required><?= htmlspecialchars($makanan['Deskripsi']) ?></textarea><br><br>

    <label for="gambar">Gambar (Kosongkan jika tidak ingin mengubah):</label><br>
    <input type="file" id="gambar" name="gambar"><br><br>

    <button type="submit">Update</button>
  </form>

  <footer>
    &copy; 2024 CRUD Admin Makanan & Pengguna.
  </footer>
</body>
</html>