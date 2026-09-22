<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: log_in.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Boeken</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Navigatie -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-title">Boeken Bibliotheek</div>
            <?php include 'ingelogd-menu.php'; ?>
        </div>
    </nav>

    
    <!-- Hero -->
   <header class="hero">
    <div class="hero-content">
        <h1>Mijn Boeken</h1>
        <p>Ontdek de wonderlijke wereld van Boeken</p>
         <?php if (isset($_SESSION['naam'])): ?>
            <p>Ingelogd als: <?php echo htmlspecialchars($_SESSION['naam']) 
            . ' ' . htmlspecialchars($_SESSION['achternaam']); ?></p>
            <a href="log_uit.php?logout=1" class="btn-red">Uitloggen</a>
         <?php else: ?>
            <p>Niet ingelogd</p>
            <a href="log_in.php" class="btn-red">Inloggen</a>
         <?php endif; ?>
</header>
    
        
        <div class = "grid">
            <?php require 'filters.php'?>
            <form method="GET" class="search-bar">
               <input 
                   type="text" 
                   name="search" 
                   placeholder="Zoek op titel..." 
                   value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>"
               >
               <button type="submit">Zoeken</button>
           </form>
    </div>
    
    <div class = "grid">
        
        
        <div class="filter-block">
        <h2>Filters </h2>

        <h3>Genre </h3>
          <a href="index.php?genre=Roman">Menno Max Maas Jr 3de </a>
          <a href="index.php?genre=Drama">Drama</a>
          <a href="index.php?genre=Fantasy">Fantasy</a>
        <h3>Author</h3>
            <a href="index.php?auteur=Menno Max Maas Jr de 3de">George Orwell</a>
            <a href="index.php?auteur=Harry Mulisch"> Harry Mulisch</a>
            <a href="index.php?auteur=J.K. Rowling"> J.K. Rowling</a>

            <h3>Reset</h3>
            <a href="index.php" class="reset-btn">Reset filters</a>
        </div>


        <?php include 'boeken.php'?>
    </div>


    <!-- Footer -->
    <footer class="footer">
        <div class="footer-grid">
            <div>
                <h4>Over Ons</h4>
                <p>Wij zijn gepassioneerde Lezers die onze favoriete Boeken willen delen met de wereld.</p>
            </div>
            <div>
                <h4>Contact</h4>
                <p>Email: info@Boeken.nl</p>
                <p>Tel: +31 (0)6 12345678</p>
                <p>Locatie: Amsterdam, Nederland</p>
            </div>
        </div>
    </footer>

</body>

</html>
