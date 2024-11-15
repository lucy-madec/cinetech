<?php
$pageTitle = "Cinetech - Favoris";
include __DIR__ . '/partials/head.php';
include __DIR__ . '/partials/header.php';
?>

<main class="content-section">
    <h2>Mes Favoris</h2>
    <div class="items-grid">
        <?php foreach ($favoris as $favori): ?>
            <div class="item">
                <a href="?page=detail&type=<?php echo htmlspecialchars($favori['element-type']); ?>&id=<?php echo htmlspecialchars($favori['element_id']); ?>">
                    <img src="https://image.tmdb.org/t/p/w200<?php echo htmlspecialchars($favori['poster_path']); ?>" alt="<?php echo htmlspecialchars($favori['title']); ?>">
                </a>
                <p><strong><?php echo htmlspecialchars($favori['title']); ?></strong></p>
                <form method="post" action="?page=remove-favori">
                    <input type="hidden" name="element_id" value="<?php echo $favori['element_id']; ?>">
                    <button type="submit">Retirer</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>