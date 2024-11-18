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

    public function addComment($userId, $elementId, $content, $parentId = null)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO comments (user_id, element_id, content, parent_id)
            VALUES (:user_id, :element_id, :content, :parent_id)
        ");
        $stmt->execute([
            ':user_id' => $userId,
            ':element_id' => $elementId,
            ':content' => $content,
            ':parent_id' => $parentId
        ]);
    }

    public function getCommentsByElement($elementId)
    {
        $stmt = $this->pdo->prepare("
            SELECT * FROM comments WHERE element_id = :element_id ORDER BY created_at DESC
        ");
        $stmt->execute([':element_id' => $elementId]);
        return $stmt->fetchAll();
    }
}
