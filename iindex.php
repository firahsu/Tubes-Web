<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Previous Winners</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      background-color: #f5f5f5;
    }
    
    /* Hero Section Fullscreen */
    .hero-section {
      position: relative;
      width: 100%;
      height: 100vh; /* Full layar */
      overflow: hidden;
    }

    .hero-section img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      opacity: 0;
      animation: fadeIn 2s forwards;
    }

    /* Fade-in animation */
    @keyframes fadeIn {
      to {
        opacity: 1;
      }
    }

    /* Centered Content */
    .hero-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: #fff;
      z-index: 1;
    }

    .hero-content h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    .hero-content p{
      font-size: 20px;
      margin-bottom: 20px;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    .hero-content a button {
      background-color: #944a37;
      color: #fff;
      padding: 12px 24px;
      border: none;
      border-radius: 5px;
      font-size: 18px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s, transform 0.2s;
    }

    .hero-content a button:hover {
      background-color: #7b392e;
      transform: scale(1.05);
    }

    /* Teks Tambahan yang Lebih Ringkas */
    .additional-text {
      text-align: center;
      margin: 10px auto; /* Mengurangi margin */
      padding: 5px 10px;
      font-size: 14px; /* Ukuran font lebih kecil */
      color: #333;
      line-height: 1.5; /* Jarak antar baris lebih kecil */
      max-width: 600px; /* Lebar maksimum teks */
    }
  </style>
</head>
<body>
  <!-- Hero Section Fullscreen -->
  <section class="hero-section">
    <img id="heroImage" src="iindex.jpg" alt="Hero Image">
    <div class="hero-content">
      <h1>Welcome to the Recipe World</h1>
      <p>
      Dari <b>hidangan tradisional</b> yang tak lekang oleh waktu, <b>makanan cepat saji</b> yang mudah dibuat, <b>menu diet sehat</b> yang menyehatkan tubuh, hingga <b>hidangan penutup</b> yang menggugah selera – temukan resep yang menghadirkan cita rasa, kebahagiaan, dan inspirasi ke meja makan Anda!
    </p>
      <a href="home.php">
      <button id="getStartedBtn">Get Started</button>
      </a>
    </div>
  </section>

  <script>
    // Smooth fade-in animation for the hero image
    window.onload = function() {
      document.getElementById('heroImage').style.animationPlayState = 'running';
    };
  </script>
</body>
</html>