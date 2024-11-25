<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: ?page=login');
    exit;
}

$pageTitle = "Contact";
include __DIR__ . '/partials/head.php';
include __DIR__ . '/partials/header.php';
?>

<main class="content-section">
    <h2 class="neon-text">Contactez-nous</h2>
    <form action="?page=send-message" method="post" class="contact-form">
        <div class="input-container">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="styled-button">Envoyer</button>
    </form>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?> 