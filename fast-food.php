<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Makanan Cepat Saji</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      background-color: #f8f8f8;
      line-height: 1.6;
    }

    /* Header & Navbar Styling */
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
      transition: color 0.3s ease;
    }

    nav a:hover {
      color: #ffd700; /* Warna emas saat hover */
    }

    nav .search-bar {
      margin-left: 20px;
    }

    nav .search-bar input {
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      outline: none;
    }

    /* Content Styling */
    .content {
      text-align: center;
      padding: 20px;
    }

    .content h1 {
      font-size: 36px;
      color: #944a37;
    }

    /* Food Grid Section */
    .food-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      padding: 20px;
      margin: 0 auto;
      max-width: 1200px;
    }

    .food-item {
  position: relative;
  overflow: hidden;
  border-radius: 10px;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  height: 300px; /* Atur tinggi food card */
}

.food-item img {
  width: 100%;
  height: 100%; /* Pastikan gambar memenuhi tinggi food card */
  object-fit: cover; /* Menjaga gambar proporsional di dalam food card */
}

    .food-item:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .food-item h2 {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      color: #fff;
      margin: 0;
      padding: 15px;
      font-size: 22px;
      text-align: center;
      text-transform: uppercase;
    }

    /* Footer Styling */
    footer {
      text-align: center;
      padding: 15px;
      background-color: #944a37;
      color: #fff;
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

  <!-- Content Section -->
  <section class="content">
    <h1>Menu Makanan Cepat Saji</h1>
  </section>

  <!-- Food Grid Section -->
  <section class="food-grid">
    <div class="food-item">
      <img src="burger.jpeg" alt="Burger">
      <h2>Burger</h2>
    </div>
    <div class="food-item">
      <img src="pizza.jpg" alt="Pizza">
      <h2>Pizza</h2>
    </div>
    <div class="food-item">
      <img src="kentang.jpg" alt="French Fries">
      <h2>French Fries</h2>
    </div>
    <div class="food-item">
      <img src="hotdog.jpeg" alt="Hot Dog">
      <h2>Hot Dog</h2>
    </div>
    <div class="food-item">
      <img src="ayam.jpg" alt="Fried Chicken">
      <h2>Fried Chicken</h2>
    </div>
    <!-- New Taco Item -->
    <div class="food-item">
      <img src="taco.jpg" alt="Taco">
      <h2>Taco</h2>
    </div>
  </section>

  <!-- Footer Section -->
  <footer>
    &copy; 2024 Virtual Cooking Challenge. All rights reserved.
  </footer>
</body>
</html>