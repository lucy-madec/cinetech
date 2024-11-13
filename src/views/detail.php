<?php
$pageTitle = isset($details['title']) ? $details['title'] : $details['name'];
include __DIR__ . '/partials/head.php';
include __DIR__ . '/partials/header.php';
?>

<main class="content-section">
    <div class="detail-container">
        <h2 class="neon-text"><?php echo htmlspecialchars($details['title'] ?? $details['name'] ?? $details['name'] ?? 'Titre indisponible'); ?></h2>

        <!-- Basic information display -->
        <div class="detail-info">
            <?php if (!empty($details['poster_path'])): ?>
                <img src="https://image.tmdb.org/t/p/w300<?php echo htmlspecialchars($details['poster_path']); ?>" alt="<?php echo htmlspecialchars($details['title'] ?? $details['name'] ?? 'Affiche indisponible'); ?>">
            <?php else: ?>
                <p>Affiche indisponible</p>
            <?php endif; ?>


            <div class="detail-text">
                <p><strong>Réalisateur :</strong> <?php echo htmlspecialchars($details['director'] ?? 'N/A'); ?></p>
                <p><strong>Types :</strong> <?php echo isset($details['genres']) ? implode(', ', array_map(fn($genre) => $genre['name'], $details['genres'])) : 'N/A'; ?></p>
                <p><strong>Pays d'origine :</strong> <?php echo htmlspecialchars($details['origin_country'][0] ?? 'N/A'); ?></p>
                <p><strong>Résumé :</strong> <?php echo htmlspecialchars($details['overview'] ?? 'Résumé indisponible'); ?></p>
                <p><strong>Acteurs :</strong> <?php echo isset($details['credits']['cast']) ? implode(', ', array_column($details['credits']['cast'], 'name')) : 'N/A'; ?></p>
            </div>
        </div>

        <!-- Suggestions for similar items -->
        <div class="similar-items">
            <h3 class="neon-text">Éléments Similaires</h3>
            <div class="items-grid">
                <?php foreach ($similarItems['results'] as $item): ?>
                    <div class="item">
                        <img src="https://image.tmdb.org/t/p/w200<?php echo htmlspecialchars($item['poster_path'] ?? ''); ?>" alt="<?php echo htmlspecialchars($item['title'] ?? $item['name'] ?? ''); ?>">
                        <p><strong><?php echo htmlspecialchars($item['title'] ?? $item['name'] ?? 'Titre indisponible'); ?></strong></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>