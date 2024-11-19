<?php
$pageTitle = isset($details['title']) ? $details['title'] : $details['name'] ?? 'Détail';
include __DIR__ . '/partials/head.php';
include __DIR__ . '/partials/header.php';

$commentsController = new \Controllers\CommentsController();
$comments = $commentsController->list($details['id'], $type);
?>

<main class="content-section detail-page">
    <div class="detail-container">
        <div class="detail-background">
            <h2 class="neon-text"><?php echo htmlspecialchars($details['title'] ?? $details['name'] ?? 'Titre indisponible'); ?></h2>
            <div class="favorite-button" data-favorited="<?php echo $isFavorited ? 'true' : 'false'; ?>" data-element-id="<?php echo $details['id']; ?>" data-element-type="<?php echo $type; ?>" data-title="<?php echo htmlspecialchars($details['title'] ?? $details['name'] ?? ''); ?>" data-poster-path="<?php echo htmlspecialchars($details['poster_path'] ?? ''); ?>">
                <i class="fa fa-star <?php echo $isFavorited ? 'filled' : 'empty'; ?>" title="<?php echo $isFavorited ? 'Retirer des favoris' : 'Ajouter aux favoris'; ?>"></i>
            </div>

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

            <div class="similar-elements">
                <h3>Éléments Similaires</h3>
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
    </div>

    <div class="comments-section">
        <h3>Commentaires</h3>
        <?php if (isset($_SESSION['user_id'])): ?>
            <form action="?page=add-comment" method="post" class="comment-form">
                <input type="hidden" name="element_id" value="<?php echo $details['id']; ?>">
                <input type="hidden" name="element_type" value="<?php echo $type; ?>">
                <div class="input-container">
                    <i class="fa fa-comment icon"></i>
                    <textarea name="content" placeholder="Laissez un commentaire..." required></textarea>
                </div>
                <button type="submit" class="styled-button">Envoyer</button>
            </form>
        <?php else: ?>
            <p class="login-prompt">Veuillez vous connecter pour laisser un commentaire.</p>
        <?php endif; ?>

        <div class="comments-list">
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <p class="comment-meta">
                        <?php echo htmlspecialchars($comment['username'] ?? 'Utilisateur inconnu'); ?> - <?php echo date('d/m/Y H:i', strtotime($comment['created_at'])); ?>
                        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === $comment['user_id']): ?>
                            <a href="?page=delete-comment&comment_id=<?php echo htmlspecialchars($comment['id'] ?? ''); ?>&element_id=<?php echo htmlspecialchars($details['id'] ?? ''); ?>&element_type=<?php echo htmlspecialchars($type ?? ''); ?>" class="delete-icon" title="Supprimer le commentaire">
                                <i class="fa fa-trash"></i>
                            </a>
                        <?php endif; ?>
                    </p>
                    <p class="comment-content"><?php echo htmlspecialchars($comment['content'] ?? ''); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>