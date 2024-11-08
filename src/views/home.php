<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinetech</title>
    <link rel="stylesheet" href="/cinetech/public/css/style.css">
</head>

<body>

    <h1>Bienvenue sur Cinetech</h1>

    <div class="content-section">
        <h2>Films populaires</h2>
        <div class="items-grid">
            <?php if (!empty($popularMovies['results'])): ?>
                <?php foreach ($popularMovies['results'] as $movie): ?>
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
                <?php foreach ($popularSeries['results'] as $series): ?>
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