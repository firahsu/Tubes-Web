<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Makanan Tradisional</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      line-height: 1.6;
      color: #333;
      background-color: #f8f8f8;
    }

    /* Header & Navbar */
    header {
      background-color: #944a37;
      color: #fff;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header .logo {
      font-size: 24px;
      font-weight: bold;
    }

    nav {
      display: flex;
      align-items: center;
    }

    nav a {
      color: #fff;
      text-decoration: none;
      margin: 0 15px;
      font-size: 16px;
    }

    nav .search-bar input {
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
    }

    /* Content Styling */
    .content {
      padding: 30px;
      text-align: center;
    }

    .content h1 {
      color: #944a37;
      font-size: 36px;
      margin-bottom: 20px;
    }

    .content p {
      font-size: 18px;
      margin-bottom: 20px;
    }

    /* Food List Layout */
    .food-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 20px;
      margin-top: 20px;
    }

    .food-item {
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .food-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .food-item img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-bottom: 2px solid #944a37;
    }

    .food-item h2 {
      font-size: 24px;
      color: #944a37;
      padding: 15px;
      text-align: center;
    }

    .food-item p {
      padding: 0 15px 20px;
      text-align: center;
      font-size: 16px;
    }

    /* Footer */
    footer {
      text-align: center;
      padding: 20px;
      background-color: #944a37;
      color: #fff;
      margin-top: 50px;
    }
  </style>
</head>
<body>
  <!-- Navbar Header -->
  <header>
    <div class="logo">Casa de Recetas</div>
    <nav>
      <a href="home.php">Home</a>
      <a href="profile.php">Profile</a>
    </nav>
  </header>

  <!-- Daftar Makanan Tradisional -->
  <section class="content">
    <h1>Cita Rasa Makanan Tradisional</h1>
    <div class="food-list">
      <!-- Rendang -->
      <div class="food-item">
        <img src="rendang.jpg" alt="Rendang">
        <h2>Rendang</h2>
        <p>Hidangan khas Minangkabau dengan daging sapi yang dimasak bersama santan dan rempah-rempah.</p>
      </div>

      <!-- Gudeg -->
      <div class="food-item">
        <img src="gudeg.jpg" alt="Gudeg">
        <h2>Gudeg</h2>
        <p>Makanan manis khas Yogyakarta yang dibuat dari nangka muda, dimasak dengan santan.</p>
      </div>

      <!-- Sate Ayam -->
      <div class="food-item">
        <img src="sate.jpg" alt="Sate Ayam">
        <h2>Sate Ayam</h2>
        <p>Daging ayam yang dipotong kecil, ditusuk, dan dibakar, disajikan dengan saus kacang.</p>
      </div>

      <!-- Pempek -->
      <div class="food-item">
        <img src="pempek.jpg" alt="Pempek">
        <h2>Pempek</h2>
        <p>Makanan khas Palembang berbahan dasar ikan dan tepung sagu, disajikan dengan kuah cuka.</p>
      </div>

      <!-- Nasi Liwet -->
      <div class="food-item">
        <img src="nasiliwet.jpg" alt="Nasi Liwet">
        <h2>Nasi Liwet</h2>
        <p>Nasi gurih khas Solo yang dimasak dengan santan, disajikan dengan sayuran dan ayam.</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    &copy; 2024 Virtual Cooking Challenge. All rights reserved.
  </footer>
</body>
</html>