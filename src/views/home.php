<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinetech</title>
    <style>
        .content-section {
            padding: 20px;
        }

        .item {
            margin: 10px 0;
        }
    </style>
</head>

<body>

    <h1>Bienvenue sur Cinetech</h1>

    <div class="content-section">
        <h2>Films populaires</h2>
        <?php if (!empty($popularMovies['results'])): ?>
            <?php foreach ($popularMovies['results'] as $movie): ?>
                <div class="item">
                    <p><strong><?php echo htmlspecialchars($movie['title']); ?></strong></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun film populaire trouvé.</p>
        <?php endif; ?>
    </div>

    <div class="content-section">
        <h2>Séries populaires</h2>
        <?php if (!empty($popularSeries['results'])): ?>
            <?php foreach ($popularSeries['results'] as $series): ?>
                <div class="item">
                    <p><strong><?php echo htmlspecialchars($series['name']); ?></strong></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune série populaire trouvée.</p>
        <?php endif; ?>
    </div>
</body>

</html>