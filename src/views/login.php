<?php include __DIR__ . '/partials/head.php'; ?>
<?php include __DIR__ . '/partials/header.php'; ?>

<main class="content-section">
    <h2>Connexion</h2>
    <form action="?page=login" method="post">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>

        <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <button type="submit">Se connecter</button>
    </form>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>