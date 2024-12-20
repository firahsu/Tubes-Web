<?php
session_start();
require_once 'db.php'; // Koneksi ke database

$message = ''; // Variabel untuk menampilkan pesan kesalahan atau informasi

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi input kosong
    if (empty($email) || empty($password)) {
        $message = "Please fill in all fields.";
    } else {
        // Query untuk memeriksa user berdasarkan email
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verifikasi password dengan password_verify
            if (password_verify($password, $user['password'])) {
                // Login berhasil, set session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role']; // Ambil role dari database

                // Set cookie jika "Remember Me" dipilih
                if (isset($_POST['remember'])) {
                    setcookie('user_id', $user['id'], time() + (86400 * 30), "/");
                    setcookie('role', $user['role'], time() + (86400 * 30), "/");
                }

                // Redirect sesuai role pengguna
                if ($user['role'] === 'admin') {
                    header("Location: CRUD-admin.php");
                } else {
                    header("Location: home.php");
                }
                exit;
            } else {
                $message = "Invalid email or password.";
            }
        } else {
            $message = "Invalid email or password.";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f9f9f9;
    }

    .container {
      display: flex;
      width: 100%;
      height: 100%;
    }

    .left {
      flex: 1;
      background: url('login.jpg') no-repeat center center/cover;
    }

    .right {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 60px;
      background-color: #fff;
    }

    .right h2 {
      font-size: 42px;
      color: #944a37;
      margin-bottom: 30px;
      text-align: center;
    }

    .form-container {
      width: 100%;
      max-width: 500px;
    }

    .form-group {
      margin-bottom: 30px;
    }

    .form-group label {
      display: block;
      font-size: 18px;
      margin-bottom: 10px;
    }

    .form-group input {
      width: 100%;
      padding: 16px;
      border: 2px solid #ddd;
      border-radius: 6px;
      font-size: 18px;
    }

    .form-group input:focus {
      border-color: #944a37;
      outline: none;
    }

    .stay-signed-in {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      font-size: 16px;
      justify-content: flex-start;
    }

    .stay-signed-in input {
      transform: scale(1.2); /* Memperbesar ukuran checkbox */
      margin: 0;
    }

    .btn {
      background-color: #944a37;
      color: #fff;
      padding: 16px;
      width: 100%;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 20px;
      font-weight: bold;
    }

    .btn:hover {
      background-color: #7b392e;
    }

    .error-message {
      color: red;
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="left"></div>
    <div class="right">
      <h2>Login</h2>
      <div class="form-container">
        <?php if (!empty($message)): ?>
          <p class="error-message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form method="POST" action="">
          <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="form-group">
            <label for="password">Password *</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="form-group stay-signed-in">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember me</label>
          </div>
          <div class="form-group" style="text-align: left; font-size: 16px; margin-top: 10px;">
            <span>Don't have an account? <a href="signUp.php" style="color: #944a37; text-decoration: none; font-weight: bold;">Sign up here</a></span>
          </div>
          <button type="submit" class="btn">Login</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>