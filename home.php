<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Virtual Cooking Challenge</title>
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

    /* Header & Navbar Styling */
    header {
      background-color: #944a37;
      color: #fff;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed; /* Navbar tetap di atas */
      top: 0; /* Menempel di bagian atas */
      left: 0;
      width: 100%;
      z-index: 1000; /* Memastikan header berada di atas elemen lain */
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
      color: #ffdd57;
    }

    nav .search-bar {
      margin-left: 20px; /* Konsistensi jarak */
    }

    nav .search-bar input {
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
    }

    /* Hero Section */
    .hero {
      margin-top: 70px; /* Menambahkan margin agar tidak tertutup oleh navbar */
      height: 60vh;
      width: 100%;
      overflow: hidden;
      position: relative;
    }

    /* Parallax Effect for Hero Image */
    .hero img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease-out;
    }

    /* Content Section */
    .content {
      text-align: center;
      padding: 20px;
      background-color: #f8f8f8;
      opacity: 0; /* Set initial opacity to 0 */
      transition: opacity 1s ease-in-out; /* Smooth opacity transition */
    }

    .content h1 {
      font-size: 40px;
      color: #944a37;
      margin-bottom: 20px;
    }

    .content p {
      font-size: 20px;
      color: black;
    }

    /* Scrollable Food Categories */
    .food-categories {
      display: flex;
      overflow-x: auto;
      gap: 20px;
      padding: 20px;
      background-color: #fff;
    }

    .food-card {
      flex: 0 0 auto;
      width: 350px;
      height: 250px;
      border-radius: 10px;
      background-color: #eee;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      color: #333;
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
      cursor: pointer;
    }

    .food-card:hover {
      transform: scale(1.1);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .food-card.traditional {
      background: url('tradisional.jpg') no-repeat center center/cover;
    }

    .food-card.fast-food {
      background: url('fastfood.jpg') no-repeat center center/cover;
    }

    .food-card.diet {
      background: url('diet.jpg') no-repeat center center/cover;
    }

    .food-card.dessert {
      background: url('dessert.jpg') no-repeat center center/cover;
    }

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
    <a href="CRUD-admin.php" class="logo">Casa de Recetas</a>
    <nav>
      <a href="#">Home</a>
      <a href="profile.php">Profile</a>
      <a href="logout.php">Logout</a>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero" id="heroSection"> <!-- Added id for parallax effect -->
    <img src="homee.jpg" alt="Cooking Image">
  </section>

  <!-- Content Section -->
  <section class="content">
    <h1>Welcome to Casa de Recetas</h1>
    <p>Ready to explore delicious categories? Choose your favorite!</p>
  </section>

  <!-- Scrollable Food Section with Links -->
  <section class="food-categories">
    <a href="traditional.php">
      <div class="food-card traditional">Makanan Tradisional</div>
    </a>
    <a href="fast-food.php">
      <div class="food-card fast-food">Makanan Cepat Saji</div>
    </a>
    <a href="diet.php">
      <div class="food-card diet">Menu Diet</div>
    </a>
    <a href="dessert.php">
      <div class="food-card dessert">Dessert</div>
    </a>
  </section>

  <!-- Footer Section -->
  <footer>
    &copy; 2024 Virtual Foodies. All rights reserved.
  </footer>

  <!-- JavaScript -->
  <script>
    // Animation for content fade-in on load
    window.addEventListener('load', () => {
      document.querySelector('.content').style.opacity = 1;
    });

    // Parallax effect for hero image
    window.addEventListener('scroll', () => {
      const hero = document.getElementById('heroSection');
      hero.querySelector('img').style.transform = 'translateY(' + window.scrollY * 0.5 + 'px)';
    });
  </script>
</body>
</html>