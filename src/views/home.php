<?php
$pageTitle = "Cinetech";
include __DIR__ . '/partials/head.php';
include __DIR__ . '/partials/header.php';
?>

<main class="content-section">
    <section class="hero">
        <h1 class="hero-title">Bienvenue sur Cinetech</h1>
        <p class="hero-subtitle">Votre portail vers l'univers du cinéma</p>
    </section>

    <section class="featured">
        <div class="title-container">
            <h2 class="neon-text">Films populaires</h2>
        </div>
        <div class="items-grid">
            <?php if (!empty($popularMovies['results'])): ?>
                <?php foreach (array_slice($popularMovies['results'], 0, 4) as $movie): ?>
                    <article class="movie-card">
                        <div class="card-image">
                            <a href="?page=detail&type=movie&id=<?php echo htmlspecialchars($movie['id']); ?>">
                                <img src="https://image.tmdb.org/t/p/w500<?php echo htmlspecialchars($movie['poster_path']); ?>" 
                                     alt="<?php echo htmlspecialchars($movie['title']); ?>"
                                     loading="lazy">
                            </a>
                        </div>
                        <div class="card-info">
                            <h3><?php echo htmlspecialchars($movie['title']); ?></h3>
                            <div class="card-details">
                                <span class="year"><?php echo substr($movie['release_date'], 0, 4); ?></span>
                                <span class="rating"><?php echo number_format($movie['vote_average'], 1); ?> ★</span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun film populaire trouvé.</p>
            <?php endif; ?>
        </div>
        <div class="section-footer">
            <a href="?page=movies" class="neon-button">Voir plus de films</a>
        </div>
    </section>

    <section class="featured">
        <div class="title-container">
            <h2 class="neon-text">Séries populaires</h2>
        </div>
        <div class="items-grid">
            <?php if (!empty($popularSeries['results'])): ?>
                <?php foreach (array_slice($popularSeries['results'], 0, 4) as $series): ?>
                    <article class="movie-card">
                        <div class="card-image">
                            <a href="?page=detail&type=tv&id=<?php echo htmlspecialchars($series['id']); ?>">
                                <img src="https://image.tmdb.org/t/p/w500<?php echo htmlspecialchars($series['poster_path']); ?>" 
                                     alt="<?php echo htmlspecialchars($series['name']); ?>"
                                     loading="lazy">
                            </a>
                        </div>
                        <div class="card-info">
                            <h3><?php echo htmlspecialchars($series['name']); ?></h3>
                            <div class="card-details">
                                <span class="year"><?php echo substr($series['first_air_date'], 0, 4); ?></span>
                                <span class="rating"><?php echo number_format($series['vote_average'], 1); ?> ★</span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucune série populaire trouvée.</p>
            <?php endif; ?>
        </div>
        <div class="section-footer">
            <a href="?page=series" class="neon-button">Voir plus de séries</a>
        </div>
    </section>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>