<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Dessert Sehat</title>
  <style>
     * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      line-height: 1.6;
      height: 100vh;
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

    nav a:hover {
      color: #ffdd57;
    }

    .search-bar {
      margin-left: 20px;
    }

    .search-bar input {
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
    }

    /* Dessert Grid */
    .dessert-content h1 {
      text-align: center;
      margin: 20px 0;
      font-size: 32px;
      color: #6a4c93;
    }

    .dessert-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      margin: 20px auto;
      padding: 20px;
      max-width: 1200px;
    }

    .dessert-item {
      background: #fff;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: all 0.4s ease;
      position: relative;
      cursor: pointer;
    }

    .dessert-item img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: transform 0.4s ease;
    }

    .dessert-item:hover img {
      transform: scale(1.1);
    }

    .dessert-item h2 {
      font-size: 20px;
      color: #6a4c93;
      padding: 10px 15px;
      background: #ffdd57;
      transition: color 0.4s ease;
    }

    .dessert-item:hover h2 {
      color: #fff;
      background-color: #944a37;
    }

    .dessert-item p {
      padding: 10px 15px 20px;
      font-size: 16px;
      color: #777;
    }

    /* Footer */
    footer {
      background-color: #944a37;
      color: #fff;
      text-align: center;
      padding: 15px;
      margin-top: 40px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <!-- Header Section -->
  <header>
    <div class="logo">Casa de Recetas</div>
    <nav>
      <a href="home.php">Home</a>
      <a href="profile.php">Profile</a>
    </nav>
  </header>

  <!-- Content -->
  <section class="dessert-content">
    <h1>Menu Dessert Sehat dan Lezat</h1>
    <div class="dessert-list">
      <!-- Chocolate Avocado Mousse -->
      <div class="dessert-item">
        <img src="chocolate.jpg" alt="Chocolate Avocado Mousse">
        <h2>Chocolate Avocado Mousse</h2>
        <p>Mousse cokelat dengan alpukat yang creamy, sehat, dan kaya nutrisi.</p>
      </div>

      <!-- Berry Parfait -->
      <div class="dessert-item">
        <img src="berry.JPG" alt="Berry Parfait">
        <h2>Berry Parfait</h2>
        <p>Parfait dengan lapisan yogurt, buah beri segar, dan granola renyah.</p>
      </div>

      <!-- Matcha Chia Pudding -->
      <div class="dessert-item">
        <img src="matcha.jpg" alt="Matcha Chia Pudding">
        <h2>Matcha Chia Pudding</h2>
        <p>Puding chia dengan sentuhan matcha yang menyegarkan dan menyehatkan.</p>
      </div>

      <!-- Mango Sticky Rice -->
      <div class="dessert-item">
        <img src="mango.jpg" alt="Mango Sticky Rice">
        <h2>Mango Sticky Rice</h2>
        <p>Ketannya lembut dipadukan dengan mangga segar, cocok sebagai hidangan penutup.</p>
      </div>

      <!-- Banana Oat Cookies -->
      <div class="dessert-item">
        <img src="banana.jpg" alt="Banana Oat Cookies">
        <h2>Banana Oat Cookies</h2>
        <p>Kue sehat berbahan dasar pisang dan oatmeal, tanpa gula tambahan.</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    &copy; 2024 Healthy Dessert Menu. All Rights Reserved.
  </footer>
</body>
</html>