<?php

namespace Controllers;

use Models\ApiModel;

class SearchController
{
    private $apiModel;

    public function __construct()
    {
        $this->apiModel = new ApiModel();
    }

    public function search()
    {
        $query = $_GET['query'] ?? '';

        if (empty($query)) {
            echo json_encode([]);
            return;
        }

        // Call the API to obtain search results
        $results = $this->apiModel->search($query);

        // Retourne les résultats en JSON
        header('Content-Type: application/json');
        echo json_encode($results);
    }
}