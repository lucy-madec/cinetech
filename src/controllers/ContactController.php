<?php

namespace Controllers;

class ContactController
{
    public function index()
    {
        $pageTitle = "Contact";
        include __DIR__ . '/../views/contact.php';
    }

    public function sendMessage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $message = $_POST['message'] ?? '';
            header('Location: ?page=contact&success=1');
            exit;
        }
    }
} 