<?php
session_start();
require_once 'db.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: signup.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$message = "";

// Baca data pengguna
$stmt = $conn->prepare("SELECT id, Nama, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Update data pengguna
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);

    if (empty($nama) || empty($email)) {
        $message = "Harap isi semua kolom.";
    } else {
        $update_stmt = $conn->prepare("UPDATE users SET Nama = ?, email = ? WHERE id = ?");
        $update_stmt->bind_param("ssi", $nama, $email, $user_id);
        if ($update_stmt->execute()) {
            $message = "Profil berhasil diperbarui.";
            header("Refresh:0");
        } else {
            $message = "Gagal memperbarui profil.";
        }
    }
}

// Hapus akun pengguna
if (isset($_POST['delete'])) {
    $delete_stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $delete_stmt->bind_param("i", $user_id);
    if ($delete_stmt->execute()) {
        session_destroy();
        header("Location: SignUp.php");
        exit;
    } else {
        $message = "Gagal menghapus akun.";
    }
}

// Menambahkan review
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_review'])) {
    $review = trim($_POST['review']);

    if (empty($review)) {
        $message = "Review tidak boleh kosong.";
    } else {
        $add_review_stmt = $conn->prepare("INSERT INTO reviews (user_id, review) VALUES (?, ?)");
        $add_review_stmt->bind_param("is", $user_id, $review);
        if ($add_review_stmt->execute()) {
            $message = "Review berhasil ditambahkan!";
            header("Refresh:0");
        } else {
            $message = "Gagal menambahkan review.";
        }
    }
}

// Menghapus review
if (isset($_POST['delete_review'])) {
    $review_id = $_POST['delete_review'];
    $delete_review_stmt = $conn->prepare("DELETE FROM reviews WHERE id = ? AND user_id = ?");
    $delete_review_stmt->bind_param("ii", $review_id, $user_id);
    if ($delete_review_stmt->execute()) {
        $message = "Review berhasil dihapus.";
    } else {
        $message = "Gagal menghapus review.";
    }
}

// Mengambil semua review untuk pengguna
$reviews_stmt = $conn->prepare("SELECT * FROM reviews WHERE user_id = ?");
$reviews_stmt->bind_param("i", $user_id);
$reviews_stmt->execute();
$reviews_result = $reviews_stmt->get_result();
$reviews = $reviews_result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Anda</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #F3E5D8; /* Krem */
            color: #5A3E2B; /* Cokelat tua */
        }

        /* Navbar Styling */
        .navbar {
            background-color: #8B5E3C; /* Cokelat solid */
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            width: 100%;
            box-sizing: border-box;
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar nav {
            display: flex;
            gap: 20px;
        }

        .navbar nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .navbar nav a:hover {
            color: #FFD700; /* Warna emas saat hover */
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            background: #FFF8F0;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        h2, h3 {
            color: #8B5E3C;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #D8B08C;
            border-radius: 8px;
            background: #FAF4ED;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #8B5E3C;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color: #6D452A;
            transform: scale(1.05);
        }

        .delete-btn {
            background-color: #C03A2B;
        }

        .delete-btn:hover {
            background-color: #A52A2A;
        }

        .message {
            color: #5A3E2B;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .footer {
            background-color: #8B5E3C;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .review-container {
            margin-top: 20px;
            border-top: 2px solid #D8B08C;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">Casa de Recetas</div>
        <nav>
            <a href="home.php">Home</a>
            <a href="logout.php">Logout</a>
        </nav>
    </div>

    <!-- Container -->
    <div class="container">
        <h2>Profil Anda</h2>

        <?php if (!empty($message)): ?>
            <p style="color: red;"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <form method="POST">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($user['Nama']) ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

            <button type="submit" name="update">Update Profil</button>
        </form>

        <form method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?');">
            <button type="submit" name="delete" class="delete-btn">Hapus Akun</button>
        </form>

        <!-- Form Review -->
        <h3>Tambah Review</h3>
        <form method="POST">
            <label>Review Anda:</label>
            <textarea name="review" required></textarea>
            <button type="submit" name="add_review">Kirim Review</button>
        </form>

        <!-- Daftar Review Pengguna -->
        <div class="review-container">
            <h3>Review Anda</h3>
            <?php if (count($reviews) > 0): ?>
                <ul>
                    <?php foreach ($reviews as $review): ?>
                        <li>
                            <p><?= htmlspecialchars($review['review']) ?></p>
                            <form method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus review ini?');">
                                <button type="submit" name="delete_review" value="<?= $review['id'] ?>" class="delete-btn">Hapus</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Anda belum menulis review.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Casa de Recetas | Cinta Makanan, Cinta Keluarga</p>
    </div>
</body>
</html>
