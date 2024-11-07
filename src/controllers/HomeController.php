<?php

namespace Controllers;

use Models\ApiModel;

class HomeController
{
    private $apiModel;

    public function __construct()
    {
        $this->apiModel = new ApiModel();
    }

    public function index()
    {
        // Retrieving popular films and series
        $popularMovies = $this->apiModel->getPopularMovies();
        $popularSeries = $this->apiModel->getPopularSeries();

        // Inclusion of home page view with data
        require_once __DIR__ . '/../views/home.php';
    }
}