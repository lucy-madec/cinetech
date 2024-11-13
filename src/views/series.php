<?php
$pageTitle = "Cinetech - Séries";
include __DIR__ . '/partials/head.php';
include __DIR__ . '/partials/header.php';
?>

<main class="content-section">
    <div class="title-container">
        <h2 class="neon-text">Séries Populaires</h2>
    </div>
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
</main>
<?php include __DIR__ . '/partials/footer.php'; ?>