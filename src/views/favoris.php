<?php
$pageTitle = "Cinetech - Favoris";
include __DIR__ . '/partials/head.php';
include __DIR__ . '/partials/header.php';
?>

<main class="content-section">
    <h2>Mes Favoris</h2>
    <div class="items-grid">
        <?php if (!empty($favoris)): ?>
            <?php foreach ($favoris as $favori): ?>
                <div class="item">
                    <a href="?page=detail&type=<?php echo htmlspecialchars($favori['element_type']); ?>&id=<?php echo htmlspecialchars($favori['element_id']); ?>">
                        <img src="https://image.tmdb.org/t/p/w200<?php echo htmlspecialchars($favori['poster_path']); ?>" alt="<?php echo htmlspecialchars($favori['title']); ?>">
                    </a>
                    <p><strong><?php echo htmlspecialchars($favori['title']); ?></strong></p>
                    <form action="?page=remove-favori" method="post">
                        <input type="hidden" name="element_id" value="<?php echo $favori['element_id']; ?>">
                        <button type="submit">Retirer</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun favori trouvé.</p>
        <?php endif; ?>
    </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>