<?php
$pageTitle = "Cinetech - Favoris";
include __DIR__ . '/partials/head.php';
include __DIR__ . '/partials/header.php';
?>

<main class="content-section">
    <h2>Mes Favoris</h2>

    <div class="title-container">
        <h3>Films Favoris</h3>
    </div>
    <div class="items-grid">
        <?php 
        $favoriteMovies = array_filter($favoris, fn($favori) => $favori['element_type'] === 'movie');
        if (!empty($favoriteMovies)): ?>
            <?php foreach ($favoriteMovies as $favori): ?>
                <div class="item">
                    <a href="?page=detail&type=movie&id=<?php echo htmlspecialchars($favori['element_id']); ?>">
                        <img src="https://image.tmdb.org/t/p/w200<?php echo htmlspecialchars($favori['poster_path']); ?>" alt="<?php echo htmlspecialchars($favori['title']); ?>">
                    </a>
                    <p><strong><?php echo htmlspecialchars($favori['title']); ?></strong></p>
                    <form action="?page=remove-favori" method="post">
                        <input type="hidden" name="element_id" value="<?php echo $favori['element_id']; ?>">
                        <button type="submit" class="favorite-button" title="Retirer des favoris">
                            <i class="fa fa-star filled"></i>
                        </button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun film favori trouvé.</p>
        <?php endif; ?>
    </div>

    <div class="title-container">
        <h3>Séries Favoris</h3>
    </div>
    <div class="items-grid">
        <?php 
        $favoriteSeries = array_filter($favoris, fn($favori) => $favori['element_type'] === 'tv');
        if (!empty($favoriteSeries)): ?>
            <?php foreach ($favoriteSeries as $favori): ?>
                <div class="item">
                    <a href="?page=detail&type=tv&id=<?php echo htmlspecialchars($favori['element_id']); ?>">
                        <img src="https://image.tmdb.org/t/p/w200<?php echo htmlspecialchars($favori['poster_path']); ?>" alt="<?php echo htmlspecialchars($favori['title']); ?>">
                    </a>
                    <p><strong><?php echo htmlspecialchars($favori['title']); ?></strong></p>
                    <form action="?page=remove-favori" method="post">
                        <input type="hidden" name="element_id" value="<?php echo $favori['element_id']; ?>">
                        <button type="submit" class="favorite-button" title="Retirer des favoris">
                            <i class="fa fa-star filled"></i>
                        </button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune série favori trouvée.</p>
        <?php endif; ?>
    </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>