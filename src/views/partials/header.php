<header class="site-header">
    <h1 class="neon-text">
        <img src="/cinetech/public/images/favicon.png" alt="Logo Cinetech" class="logo-icon">
        CINETECH<?php if (isset($_SESSION['user_id'])): ?> <span class="user-info">de <?php echo htmlspecialchars($_SESSION['username']); ?></span><?php endif; ?>
    </h1>
    <button class="burger-menu" aria-label="Toggle navigation" onclick="toggleMenu()">
        <i class="fa fa-bars"></i>
        <i class="fa fa-times" style="display: none;"></i>
    </button>
    <nav class="navbar">
        <a href="?page=home" class="neon-text">Accueil</a>
        <a href="?page=movies" class="neon-text">Films</a>
        <a href="?page=series" class="neon-text">Séries</a>
        <a href="?page=contact" class="neon-text">Contact</a>
        <form action="" class="search-bar" method="get" onsubmit="return false;">
            <input type="text" id="search-input" autocomplete="off" placeholder="Rechercher...">
            <div id="search-results"></div>
        </form>
        <div class="profile-menu">
            <i class="fa fa-user-circle neon-text profile-icon"></i>
            <div class="dropdown-menu">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="?page=favoris">Mes favoris</a>
                    <a href="?page=logout">Déconnexion</a>
                <?php else: ?>
                    <a href="?page=login">Connexion</a>
                    <a href="?page=register">Inscription</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>