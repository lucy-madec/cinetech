<?php

namespace Controllers;

use Models\ApiModel;

class MoviesController
{
    private $apiModel;

    public function __construct()
    {
        $this->apiModel = new ApiModel();
    }
    
    public function index()
    {
        // Retrieving popular films from the API
        $popularMovies = $this->apiModel->getPopularMovies();

        // Passing data to the view
        require_once __DIR__ . '/../views/movies.php';
    }
}