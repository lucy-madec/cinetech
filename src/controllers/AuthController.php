<?php

namespace Controllers;

use Models\UserModel;

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $error = $this->userModel->register($username, $email, $password);
            if ($error) {
                require_once __DIR__ . '/../views/register.php';
                echo '<p class="error-message">' . htmlspecialchars($error) . '</p>';
                return;
            }

            header('Location: ?page=login');
            exit;
        }

        require_once __DIR__ . '/../views/register.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->login($email, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: ?page=home');
                exit;
            }

            $error = "Identifiants incorrects.";
        }

        require_once __DIR__ . '/../views/login.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: ?page=home');
        exit;
    }
}