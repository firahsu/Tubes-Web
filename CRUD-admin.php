<?php
require_once 'db.php'; // Koneksi ke database

// Ambil data makanan dari database
$result_makanan = $conn->query("SELECT * FROM makanan");
if (!$result_makanan) {
    die("Error: " . $conn->error);
}

// Ambil data pengguna dari database
$result_users = $conn->query("SELECT * FROM users");
if (!$result_users) {
    die("Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin CRUD - Makanan & Pengguna</title>
  <style>
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

    /* Header dengan Navbar */
    header {
      background-color: #6f4f28;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: relative;
      padding: 20px 30px;
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

    h2 {
      text-align: center;
      margin: 20px 0;
      color: #6f4f28;
    }

    table {
      width: 80%;
      margin: 0 auto 30px;
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

    .btn {
      padding: 6px 12px;
      margin-right: 5px;
      border: none;
      color: white;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn-primary {
      background-color: #6f4f28;
      margin: 20px auto;
      display: block;
      width: fit-content;
    }

    .btn-warning {
      background-color: #deb887;
      color: #3e3b36;
    }

    .btn-danger {
      background-color: #d2691e;
    }

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
  <!-- Header dengan Navbar -->
  <header>
    <div class="title">CRUD Admin - Semua Kategori</div>
    <nav class="navbar">
      <a href="home.php">Home</a>
      <a href="logout.php">Logout</a>
    </nav>
  </header>

  <!-- Tabel Daftar Makanan -->
  <h2>Daftar Semua Makanan</h2>
  <button class="btn btn-primary" onclick="window.location.href='create.food.php'">Tambah Makanan</button>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Nama Makanan</th>
        <th>Deskripsi</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; while ($makanan = $result_makanan->fetch_assoc()): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($makanan['Kategori']) ?></td>
        <td><?= htmlspecialchars($makanan['NamaMakanan']) ?></td>
        <td><?= htmlspecialchars($makanan['Deskripsi']) ?></td>
        <td>
          <img src="uploads/<?= htmlspecialchars($makanan['gambar']) ?>" alt="<?= htmlspecialchars($makanan['NamaMakanan']) ?>">
        </td>
        <td>
        <a href="edit-food.php?id=<?= $makanan['id'] ?>" class="btn btn-warning">Edit</a>
        <button class="btn btn-danger" onclick="confirmDeleteMakanan(<?= $makanan['id'] ?>)">Hapus</button>
      </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <!-- Tabel Data Pengguna -->
  <h2>Data Pengguna</h2>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; while ($user = $result_users->fetch_assoc()): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($user['Nama']) ?></td>
        <td><?= htmlspecialchars($user['email']) ?></td>
        <td>
          <button class="btn btn-danger" onclick="confirmDeleteUser(<?= $user['id'] ?>)">Hapus</button>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <!-- Footer -->
  <footer>
    &copy; 2024 CRUD Admin Makanan & Pengguna. All Rights Reserved.
  </footer>

  <!-- JavaScript -->
  <script>
    function confirmDeleteMakanan(id) {
      if (confirm("Apakah Anda yakin ingin menghapus data makanan ini?")) {
        window.location.href = "delete_makanan.php?id=" + id;
      }
    }

    function confirmDeleteUser(id) {
      if (confirm("Apakah Anda yakin ingin menghapus data pengguna ini?")) {
        window.location.href = "delete_user.php?id=" + id;
      }
    }
  </script>
</body>
</html>