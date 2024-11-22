<?php

namespace Controllers;

class ContactController
{
    public function index()
    {
        $pageTitle = "Contact";
        include __DIR__ . '/../views/contact.php';
    }
} 