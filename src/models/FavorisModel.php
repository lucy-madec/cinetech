<?php

namespace Models;

use PDO;

class FavorisModel
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

    public function addFavori($userId, $elementId, $elementType, $title, $posterPath)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO favorites (user_id, element_id, element_type, title, poster_path)
            VALUES (:user_id, :element_id, :element_type, :title, :poster_path)
        ");
        $stmt->execute([
            ':user_id' => $userId,
            ':element_id' => $elementId,
            ':element_type' => $elementType,
            ':title' => $title,
            ':poster_path' => $posterPath
        ]);
    }

    public function getFavoris($userId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM favorites WHERE user_id = :user_id");
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll();
    }

    public function removeFavori($userId, $elementId)
    {
        $stmt = $this->pdo->prepare("DELETE FROM favorites WHERE user_id = :user_id AND element_id = :element_id");
        $stmt->execute([
            ':user_id' => $userId,
            ':element_id' => $elementId,
        ]);
    }
}
