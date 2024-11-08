<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinetech</title>
    <link rel="stylesheet" href="/cinetech/public/css/style.css">
</head>

<body>
    <header class="site-header">
        <h1>Cinetech</h1>
        <nav class="navbar">
            <a href="?page=home">Accueil</a>
            <a href="?page=movies">Films</a>
            <a href="?page=series">Séries</a>
            <form action="?page=search" class="search-bar" method="get">
                <input type="text" name="query" placeholder="Rechercher...">
                <button type="submit">🔍</button>
            </form>
        </nav>
    </header>

    <div class="content-section">
        <h2>Films populaires</h2>
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
        <h2>Séries populaires</h2>
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
</body>

</html>