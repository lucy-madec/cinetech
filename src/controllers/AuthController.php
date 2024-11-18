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

            $this->userModel->register($username, $email, $password);
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
                header('Location: ?page=favoris');
                exit;
            }

            $error = "Identifiants incorrects.";
        }

        require_once __DIR__ . '/../views/login.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: ?page=login');
        exit;
    }
}