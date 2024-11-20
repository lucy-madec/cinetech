<?php

namespace Controllers;

use Models\CommentsModel;

class CommentsController
{
    private $commentsModel;

    public function __construct()
    {
        $this->commentsModel = new CommentsModel();
    }

    public function add()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?page=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];
            $elementId = $_POST['element_id'];
            $elementType = $_POST['element_type'];
            $content = $_POST['content'];
            $parentId = $_POST['parent_id'] ?? null;

            $this->commentsModel->addComment($userId, $elementId, $elementType, $content, $parentId);

            header('Location: ?page=detail&type=' . $elementType . '&id=' . $elementId);
            exit;
        }
    }

    public function list($elementId, $elementType)
    {
        return $this->commentsModel->getCommentsTreeByElement($elementId, $elementType);
    }

    public function delete()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?page=login');
            exit;
        }

        if (isset($_GET['comment_id'])) {
            $commentId = $_GET['comment_id'];
            $userId = $_SESSION['user_id'];

            $success = $this->commentsModel->deleteComment($commentId, $userId);

            if (!$success) {
                echo "Erreur : Impossible de supprimer ce commentaire.";
                exit;
            }

            $elementId = $_GET['element_id'] ?? null;
            $elementType = $_GET['element_type'] ?? null;
            if (!$elementId || !$elementType) {
                echo "Erreur : ID non spécifié pour la page de détail.";
                exit;
            }

            header('Location: ?page=detail&type=' . $elementType . '&id=' . $elementId);
            exit;
        }
    }
}
