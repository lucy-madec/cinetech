<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinetech</title>
    <link rel="stylesheet" href="/cinetech/public/css/style.css">
    <link rel="icon" href="/cinetech/public/images/favicon.png" type="image/png">
    <!-- Google Fonts - Tilt Neon -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
</head>

<body>
    <header class="site-header">
        <h1 class="neon-text">
            <img src="/cinetech/public/images/favicon.png" alt="Logo Cinetech" class="logo-icon">
            Cinetech
        </h1>
        <nav class="navbar">
            <a href="?page=home" class="neon-text">Accueil</a>
            <a href="?page=movies" class="neon-text">Films</a>
            <a href="?page=series" class="neon-text">Séries</a>
            <form action="?page=search" class="search-bar" method="get">
                <input type="text" name="query" placeholder="Rechercher...">
                <button type="submit">🔍</button>
            </form>
        </nav>
    </header>

    <div class="content-section">
        <div class="title-container">
            <h2 class="neon-text">Films populaires</h2>
        </div>
        <div class="items-grid">
            <?php if (!empty($popularMovies['results'])): ?>
                <?php foreach (array_slice($popularMovies['results'], 0, 4) as $movie): ?>
                    <div class="item">
                        <img src="https://image.tmdb.org/t/p/w200<?php echo htmlspecialchars($movie['poster_path']); ?>" alt="<?php echo htmlspecialchars($movie['title']); ?>">
                        <p><strong><?php echo htmlspecialchars($movie['title']); ?></strong></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun film populaire trouvé.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="content-section">
        <div class="title-container">
            <h2 class="neon-text">Séries populaires</h2>
        </div>
        <div class="items-grid">
            <?php if (!empty($popularSeries['results'])): ?>
                <?php foreach (array_slice($popularSeries['results'], 0, 4) as $series): ?>
                    <div class="item">
                        <img src="https://image.tmdb.org/t/p/w200<?php echo htmlspecialchars($series['poster_path']); ?>" alt="<?php echo htmlspecialchars($series['name']); ?>">
                        <p><strong><?php echo htmlspecialchars($series['name']); ?></strong></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucune série populaire trouvée.</p>
            <?php endif; ?>
        </div>
    </div>
    <footer class="site-footer">
        <div class="footer-content">
            <p class="neon-text">© Cinetech. Tous droits réservés.</p>
            <nav class="footer-nav">
                <a href="?page=home" class="neon-text">Accueil</a>
                <a href="?page=movies">Films</a>
                <a href="?page=series" class="neon-text">Séries</a>
                <a href="?page=contact">Contact</a>
            </nav>
        </div>
    </footer>
</body>

</html>