<?php
$pageTitle = isset($details['title']) ? $details['title'] : $details['name'];
include __DIR__ . '/partials/head.php';
include __DIR__ . '/partials/header.php';
?>

<main class="content-section">
    <div class="detail-container">
        <h2 class="neon-text"><?php echo isset($details['title']) ? htmlspecialchars($details['title']) : htmlspecialchars($details['name']); ?></h2>

        <!-- Basic information display -->
        <div class="detail-info">
            <img src="https://image.tmdb.org/t/p/w300<?php echo htmlspecialchars($details['poster_path']); ?>" alt="<?php echo htmlspecialchars($details['title'] ?? $details['name']); ?>">
            <div class="detail-text">
                <p><strong>Réalisateur :</strong> <?php echo htmlspecialchars($details['director'] ?? 'N/A'); ?></p>
                <p><strong>Genres :</strong> <?php echo implode(', ', array_map(fn($genre) => $genre['name'], $details['genres'] ?? [])); ?></p>
                <p><strong>Pays d'origine :</strong><?php echo htmlspecialchars($details['origin_country'][0] ?? 'N/A'); ?></p>
                <p><strong>Résumé :</strong> <?php echo htmlspecialchars($details['overview']); ?></p>
                <p><strong>Acteurs :</strong> <?php echo implode(', ', array_column($details['credits']['cast'] ?? [], 'name')); ?></p>
            </div>
        </div>

        <!-- Suggestions for similar items -->
        <div class="similar-items">
            <h3 class="neon-text">Éléments Similaires</h3>
            <div class="items-grid">
                <?php foreach ($similarItems['results'] as $item): ?>
                    <div class="item">
                        <img src="https://image.tmdb.org/t/p/w200<?php echo htmlspecialchars($item['poster_path']); ?>" alt="<?php echo htmlspecialchars($item['title'] ?? $item['name']); ?>">
                        <p><strong><?php echo htmlspecialchars($item['title'] ?? $item['name']); ?></strong></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>