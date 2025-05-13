<header class="site-header">
    <div class="header-left">
        <h1 class="site-title">
            <a href="?page=home" class="logo-link">
                <img src="/cinetech/public/images/favicon.png" alt="Logo Cinetech" class="logo-icon">
                <span>CINETECH</span>
            </a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <span class="user-badge">
                    <i class="fa fa-user"></i>
                    <?php echo htmlspecialchars($_SESSION['username']); ?>
                </span>
            <?php endif; ?>
        </h1>
    </div>

    <div class="header-center">
        <form action="" class="search-bar" method="get" onsubmit="return false;">
            <div class="search-wrapper">
                <i class="fa fa-search search-icon"></i>
                <input type="text" id="search-input" autocomplete="off" placeholder="Rechercher un film ou une série...">
                <div id="search-results" class="search-results-dropdown"></div>
            </div>
        </form>
    </div>
    
    <div class="header-right">
        <button class="burger-menu" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
            <i class="fa fa-times" style="display: none;"></i>
        </button>

            <nav class="navbar">
                <div class="nav-links">
                    <a href="?page=home" class="nav-link"><i class="fa fa-home"></i> Accueil</a>
                    <a href="?page=movies" class="nav-link"><i class="fa fa-film"></i> Films</a>
                    <a href="?page=series" class="nav-link"><i class="fa fa-tv"></i> Séries</a>
                    <a href="?page=contact" class="nav-link"><i class="fa fa-envelope"></i> Contact</a>
                </div>

                <div class="profile-menu">
                    <button class="profile-button">
                        <i class="fa fa-user-circle"></i>
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <div class="dropdown-menu">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <a href="?page=favoris" class="dropdown-item">
                                <i class="fa fa-heart"></i> Mes favoris
                            </a>
                            <a href="?page=logout" class="dropdown-item">
                                <i class="fa fa-sign-out"></i> Déconnexion
                            </a>
                        <?php else: ?>
                            <a href="?page=login" class="dropdown-item">
                                <i class="fa fa-sign-in"></i> Connexion
                            </a>
                            <a href="?page=register" class="dropdown-item">
                                <i class="fa fa-user-plus"></i> Inscription
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>