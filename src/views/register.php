<?php include __DIR__ . '/partials/head.php'; ?>
<?php include __DIR__ . '/partials/header.php'; ?>

<main class="content-section">
    <h2>Inscription</h2>
    <form action="?page=register" method="post">
        <div class="input-container">
            <i class="fa fa-user icon"></i>
            <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" required>
        </div>

        <div class="input-container">
            <i class="fa fa-envelope icon"></i>
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-container">
            <i class="fa fa-lock icon"></i>
            <input type="password" name="password" id="password" placeholder="Mot de passe" required>
        </div>

        <button type="submit" class="styled-button">S'inscrire</button>
    </form>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>