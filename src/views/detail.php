<?php
$pageTitle = isset($details['title']) ? $details['title'] : $details['name'] ?? 'Détail';
include __DIR__ . '/partials/head.php';
include __DIR__ . '/partials/header.php';
?>

<main class="content-section">
    <div class="detail-container">
        <div class="detail-background">
            <h2 class="neon-text"><?php echo htmlspecialchars($details['title'] ?? $details['name'] ?? $details['name'] ?? 'Titre indisponible'); ?></h2>

            <!-- Basic information display -->
            <div class="detail-info">
                <?php if (!empty($details['poster_path'])): ?>
                    <img src="https://image.tmdb.org/t/p/w300<?php echo htmlspecialchars($details['poster_path']); ?>" alt="<?php echo htmlspecialchars($details['title'] ?? $details['name'] ?? 'Affiche indisponible'); ?>">
                <?php else: ?>
                    <p>Affiche indisponible</p>
                <?php endif; ?>


                <div class="detail-text">
                    <p><strong>Réalisateur :</strong>
                        <?php
                        if (isset($details['credits']['crew'])) {
                            $directors = array_filter($details['credits']['crew'], fn($crew) => $crew['job'] === 'Director');
                            if (!empty($directors)) {
                                echo htmlspecialchars(implode(', ', array_column($directors, 'name')));
                            } else {
                                echo 'N/A';
                            }
                        } else {
                            echo 'N/A';
                        }
                        ?>
                    </p>
                    <p><strong>Types :</strong> <?php echo isset($details['genres']) ? implode(', ', array_map(fn($genre) => $genre['name'], $details['genres'])) : 'N/A'; ?></p>
                    <p><strong>Pays d'origine :</strong> <?php echo htmlspecialchars($details['origin_country'][0] ?? 'N/A'); ?></p>
                    <p><strong>Résumé :</strong> <?php echo htmlspecialchars($details['overview'] ?? 'Résumé indisponible'); ?></p>
                    <p><strong>Acteurs :</strong> <?php echo isset($details['credits']['cast']) ? implode(', ', array_column($details['credits']['cast'], 'name')) : 'N/A'; ?></p>
                </div>
            </div>
        </div>

        <!-- Favorites -->
        <div class="favorite-button" data-favorited="<?php echo $isFavorited ? 'true' : 'false'; ?>" data-element-id="<?php echo $details['id']; ?>" data-element-type="<?php echo $type; ?>">
            <i class="fa fa-star <?php echo $isFavorited ? 'filled' : 'empty'; ?>" title="<?php echo $isFavorited ? 'Retirer des favoris' : 'Ajouter aux favoris'; ?>"></i>
        </div>

        <!-- Suggestions for similar items -->
        <div class="similar-items">
            <h3 class="neon-text">Éléments Similaires</h3>
            <div class="items-grid">
                <?php if (!empty($filteredItems)): ?>
                    <?php foreach ($filteredItems as $item): ?>
                        <div class="item">
                            <a href="?page=detail&type=<?php echo htmlspecialchars($type); ?>&id=<?php echo htmlspecialchars($item['id']); ?>">
                                <img src="https://image.tmdb.org/t/p/w200<?php echo htmlspecialchars($item['poster_path'] ?? ''); ?>" alt="<?php echo htmlspecialchars($item['title'] ?? $item['name'] ?? 'Titre indisponible'); ?>">
                            </a>
                            <p><strong><?php echo htmlspecialchars($item['title'] ?? $item['name'] ?? 'Titre indisponible'); ?></strong></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aucun élément similaire trouvé.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>