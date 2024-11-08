<?php

namespace Router;

class Router
{
    public function routeRequest()
    {
        // Retrieves URL to determine route
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

        switch ($page) {
            case 'movies':
                $controller = new \Controllers\MoviesController();
                $controller->index();
                break;
            case 'series':
                $controller = new \Controllers\SeriesController();
                $controller->index();
                break;
            case 'home':
            default:
                $controller = new \Controllers\HomeController();
                $controller->index();
                break;
        }
    }
}