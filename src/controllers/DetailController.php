<?php

namespace Controllers;

use Models\ApiModel;

class DetailController
{
    private $apiModel;

    public function __construct()
    {
        $this->apiModel = new ApiModel();
    }

    public function index($type, $id)
    {
        // Retrieve item details (film or series)
        $details = $this->apiModel->getDetails($type, $id);

        // Recovery of similar items
        $similarItems = $this->apiModel->getSimilar($type, $id);

        // Passing data to the view
        require_once __DIR__ . '/../views/detail.php';
    }
}