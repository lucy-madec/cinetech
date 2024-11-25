<?php include __DIR__ . '/partials/head.php'; ?>
<?php include __DIR__ . '/partials/header.php'; ?>

<main class="content-section">
    <h2>Connexion</h2>
    <form action="?page=login" method="post">
        <div class="input-container">
            <i class="fa fa-envelope icon"></i>
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-container">
            <i class="fa fa-lock icon"></i>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required>
        </div>

        <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <button type="submit" class="styled-button">Se connecter</button>
    </form>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>