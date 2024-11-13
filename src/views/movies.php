<?php
$pageTitle = "Cinetech - Films";
include __DIR__ . '/partials/head.php';
include __DIR__ . '/partials/header.php';
?>
<main class="content-section">
    <div class="title-container">
        <h2 class="neon-text">Films populaires</h2>
    </div>
    <div class="items-grid">
        <?php if (!empty($popularMovies['results'])): ?>
            <?php foreach ($popularMovies['results'] as $movie): ?>
                <div class="item">
                    <a href="?page=detail&type=movie&id=<?php echo htmlspecialchars($movie['id']); ?>">
                        <img src="https://image.tmdb.org/t/p/w200<?php echo htmlspecialchars($movie['poster_path']); ?>" alt="<?php echo htmlspecialchars($movie['title']); ?>">
                    </a>
                    <p><strong><?php echo htmlspecialchars($movie['title']); ?></strong></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun film populaire trouvé.</p>
        <?php endif; ?>
    </div>
</main>
<?php include __DIR__ . '/partials/footer.php'; ?>