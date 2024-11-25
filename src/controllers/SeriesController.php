<?php

namespace Controllers;

use Models\ApiModel;

class SeriesController
{
    private $apiModel;
    
    public function __construct()
    {
        $this->apiModel = new ApiModel();
    }

    public function index()
    {
        // Retrieving popular series from the API
        $popularSeries = $this->apiModel->getPopularSeries();

        // Passing data to the view
        require_once __DIR__ . '/../views/series.php';
    }
}