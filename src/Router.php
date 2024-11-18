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
            case 'detail':
                $type = $_GET['type'] ?? 'movie'; // default "movie"
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $controller = new \Controllers\DetailController();
                    $controller->index($type, $id);
                } else {
                    echo "ID non spécifié pour la page de détail.";
                }
                break;
            case 'home':
            default:
                $controller = new \Controllers\HomeController();
                $controller->index();
                break;
            case 'search':
                $controller = new \Controllers\SearchController();
                $controller->search();
                break;
            case 'add-favori':
                $controller = new \Controllers\FavorisController();
                $controller->add();
                break;
            case 'favoris':
                $controller = new \Controllers\FavorisController();
                $controller->list();
                break;
            case 'remove-favori':
                $controller = new \Controllers\FavorisController();
                $controller->remove();
                break;
            case 'register':
                $controller = new \Controllers\AuthController();
                $controller->register();
                break;
            case 'login':
                $controller = new \Controllers\AuthController();
                $controller->login();
                break;
            case 'logout':
                $controller = new \Controllers\AuthController();
                $controller->logout();
                break;
        }
    }
}