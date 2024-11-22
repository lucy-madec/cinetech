<?php
$pageTitle = "Contact";
include __DIR__ . '/partials/head.php';
include __DIR__ . '/partials/header.php';
?>

<main class="content-section">
    <h2 class="neon-text">Contactez-nous</h2>
    <form action="/path/to/contact/handler" method="post" class="contact-form">
        <div class="input-container">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="input-container">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-container">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="styled-button">Envoyer</button>
    </form>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?> 