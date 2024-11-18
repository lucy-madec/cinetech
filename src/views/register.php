<?php include __DIR__ . '/partials/head.php'; ?>
<?php include __DIR__ . '/partials/header.php'; ?>

<main class="content-section">
    <h2>Inscription</h2>
    <form action="?page=register" method="post">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">S'inscrire</button>
    </form>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>