<?php

namespace Controllers;

use Models\FavorisModel;

class FavorisController
{
    private $favorisModel;

    public function __construct()
    {
        $this->favorisModel = new FavorisModel();
    }

    public function add()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?page=login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $elementId = $_POST['element_id'];
        $elementType = $_POST['element_type'];
        $title = $_POST['title'];
        $posterPath = $_POST['poster_path'];

        $this->favorisModel->addFavori($userId, $elementId, $elementType, $title, $posterPath);

        header('Location: ?page=favoris');
    }

    public function list()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?page=login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $favoris = $this->favorisModel->getFavoris($userId);

        require_once __DIR__ . '/../views/favoris.php';
    }

    public function remove()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?page=login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $elementId = $_POST['element_id'];

        $this->favorisModel->removeFavori($userId, $elementId);

        header('Location: ?page=favoris');
        exit;
    }
}
