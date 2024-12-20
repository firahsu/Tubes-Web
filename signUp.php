<?php
session_start();
require_once 'db.php'; // Memanggil koneksi database

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $nama = trim($_POST['name']); // Cocok dengan kolom 'Nama' di database
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $remember = isset($_POST['remember']);

    // Validasi input kosong
    if (empty($nama) || empty($email) || empty($password) || empty($confirm_password)) {
        $message = "Harap isi semua kolom.";
    } elseif ($password !== $confirm_password) {
        $message = "Password tidak cocok.";
    } else {
        // Hash password untuk keamanan
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk menyimpan data user
        $stmt = $conn->prepare("INSERT INTO users (Nama, email, password, role) VALUES (?, ?, ?, ?)");
        $role = 'user'; // Default role
        $stmt->bind_param("ssss", $nama, $email, $hashed_password, $role);

        if ($stmt->execute()) {
            // Simpan sesi pengguna setelah berhasil mendaftar
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;

            // Set cookie jika pengguna memilih "Remember Me"
            if ($remember) {
                setcookie('user_id', $conn->insert_id, time() + (86400 * 30), "/");
                setcookie('role', $role, time() + (86400 * 30), "/");
            }

            // Redirect ke halaman home.php setelah berhasil sign up
            header("Location: home.php");
            exit;
        } else {
            $message = "Pendaftaran gagal. Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #F3E5D8, #C69C6D);
        }

        /* Container utama */
        .signup-container {
            background: #FFF8F0;
            border-radius: 10px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 400px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        /* Animasi masuk */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            margin-bottom: 20px;
            font-size: 1.8em;
            color: #5A3E2B; /* Warna coklat tua */
        }

        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #8C5A3C; /* Warna coklat medium */
        }

        input {
            width: 100%;
            padding: 10px;
            border: 2px solid #C69C6D; /* Warna coklat muda */
            border-radius: 5px;
            font-size: 14px;
            outline: none;
            background-color: #FAF4ED; /* Latar input */
            color: #5A3E2B; /* Teks input */
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #8C5A3C; /* Warna coklat medium */
            box-shadow: 0 0 8px rgba(140, 90, 60, 0.4);
        }

        button {
            margin-top: 20px;
            padding: 12px;
            background: linear-gradient(to right, #8C5A3C, #5A3E2B); /* Gradien coklat */
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.3s;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(140, 90, 60, 0.4);
        }

        /* Responsif untuk perangkat kecil */
        @media (max-width: 500px) {
            .signup-container {
                width: 90%;
                padding: 20px;
            }
        }

   .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <?php if (!empty($message)): ?>
            <p class="error-message"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <label for="name">Nama *</label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required>

            <label for="email">Email *</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>

            <label for="password">Password *</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>

            <label for="confirm_password">Konfirmasi Password *</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Konfirmasi password Anda" required>

            <button type="submit">Daftar</button>
        </form>
    </div>
</body>
</html>