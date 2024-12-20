<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Diet Sehat</title>
  <style>
    /* Reset CSS */
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

    /* Header Navbar */
    header {
      background-color: #944a37;
      color: #fff;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 1000;
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
      color: #ffd700; /* Warna emas */
    }

    nav .search-bar input {
      padding: 5px 10px;
      border: 2px solid #ffd700;
      border-radius: 4px;
      outline: none;
    }

    /* Content Section */
    .content {
      text-align: center;
      padding: 40px 20px;
    }

    .content h1 {
      font-size: 36px;
      color: #944a37;
      margin-bottom: 20px;
    }

     /* Food Grid */
     .food-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      margin: 0 auto;
      padding: 20px;
      max-width: 1200px;
    }

    .food-item {
      background: #fff;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: all 0.4s ease;
      position: relative;
      cursor: pointer;
    }

    .food-item::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 0;
      background: rgba(148, 74, 55, 0.7); /* Warna transparan */
      transition: height 0.4s ease;
      z-index: 1;
    }

    .food-item:hover::before {
      height: 100%; /* Efek fill pada hover */
    }

    .food-item img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: transform 0.4s ease;
    }

    .food-item:hover img {
      transform: scale(1.1); /* Efek zoom pada gambar */
    }

    .food-item h2 {
      font-size: 20px;
      color: #6a4c93;
      padding: 10px 15px;
      background: #ffdd57;
      position: relative;
      z-index: 2;
      transition: color 0.4s ease;
    }

    .food-item:hover h2 {
      color: #fff; /* Warna putih saat hover */
    }

    .food-item p {
      padding: 10px 15px 20px;
      font-size: 16px;
      color: #777;
      position: relative;
      z-index: 2;
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
  <!-- Navbar -->
  <header>
    <div class="logo">Casa de Recetas</div>
    <nav>
      <a href="home.php">Home</a>
      <a href="profile.php">Profile</a>
    </nav>
  </header>

  <!-- Content -->
  <section class="content">
    <h1>Temukan makanan sehat dengan tampilan menggugah selera dan nutrisi terbaik!</h1>
    <div class="food-list">
      <!-- Grilled Salmon -->
      <div class="food-item">
        <img src="salmon.jpg" alt="Grilled Salmon">
        <h2>Grilled Salmon</h2>
        <p>Salmon panggang kaya protein dan omega-3, baik untuk jantung dan otak.</p>
      </div>

      <!-- Caesar Salad -->
      <div class="food-item">
        <img src="salad.jpg" alt="Caesar Salad">
        <h2>Caesar Salad</h2>
        <p>Salad sehat dengan sayuran hijau segar, ayam panggang, dan saus spesial.</p>
      </div>

      <!-- Smoothie Bowl -->
      <div class="food-item">
        <img src="smoothie.jpg" alt="Smoothie Bowl">
        <h2>Smoothie Bowl</h2>
        <p>Campuran buah-buahan segar dan biji-bijian untuk sarapan sehat.</p>
      </div>

      <!-- Quinoa Salad -->
      <div class="food-item">
        <img src="salad2.jpeg" alt="Quinoa Salad">
        <h2>Quinoa Salad</h2>
        <p>Salad quinoa kaya serat dan protein, sempurna untuk diet rendah kalori.</p>
      </div>

      <!-- Avocado Toast -->
      <div class="food-item">
        <img src="toast.jpg" alt="Avocado Toast">
        <h2>Avocado Toast</h2>
        <p>Roti panggang dengan alpukat segar dan topping sehat lainnya.</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    &copy; 2024 Healthy Diet Menu. All Rights Reserved.
  </footer>
</body>
</html>