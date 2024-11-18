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

        $userId = $_SESSION['user_id'];
        $elementId = $_POST['element_id'];
        $content = $_POST['content'];
        $parentId = $_POST['parent_id'] ?? null;

        $this->commentsModel->addComment($userId, $elementId, $content, $parentId);

        header('Location: ?page=detail&id=' . $elementId);
        exit;
    }

    public function list($elementId)
    {
        return $this->commentsModel->getCommentsByElement($elementId);
    }
}
