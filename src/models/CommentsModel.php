<?php

namespace Models;

use PDO;

class CommentsModel
{
    private $pdo;

    public function __construct()
    {
        $config = require __DIR__ . '/../../config/database.php';

        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
        $this->pdo = new PDO($dsn, $config['username'], $config['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function addComment($userId, $elementId, $elementType, $content, $parentId = null)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO comments (user_id, element_id, element_type, content, parent_id)
            VALUES (:user_id, :element_id, :element_type, :content, :parent_id)
        ");
        $stmt->execute([
            ':user_id' => $userId,
            ':element_id' => $elementId,
            ':element_type' => $elementType,
            ':content' => $content,
            ':parent_id' => $parentId
        ]);
    }

    public function getCommentsByElement($elementId, $elementType)
    {
        $stmt = $this->pdo->prepare("
        SELECT comments.id, comments.content, comments.created_at, comments.user_id, users.username 
        FROM comments 
        JOIN users ON comments.user_id = users.id 
        WHERE comments.element_id = :element_id AND comments.element_type = :element_type
        ORDER BY comments.created_at DESC
    ");
        $stmt->execute([':element_id' => $elementId, ':element_type' => $elementType]);
        return $stmt->fetchAll();
    }

    public function deleteComment($commentId, $userId)
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM comments 
            WHERE id = :comment_id AND user_id = :user_id
        ");
        $stmt->execute([':comment_id' => $commentId, ':user_id' => $userId]);

        return $stmt->rowCount() > 0;
    }
}
