<?php

namespace Controllers;

class MoviesController
{
    public function index()
    {
        require_once __DIR__ . '/../views/movies.php';
    }
}