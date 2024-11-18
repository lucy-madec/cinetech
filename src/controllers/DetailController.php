<?php

namespace Controllers;

use Models\ApiModel;
use Models\FavorisModel;

class DetailController
{
    private $apiModel;

    public function __construct()
    {
        $this->apiModel = new ApiModel();
    }

    public function index($type, $id)
    {
        // Retrieve element details
        $details = $this->apiModel->getDetails($type, $id);

        // Recovery of similar items from TMDb
        $similarItems = $this->apiModel->getSimilar($type, $id);

        // Check whether the user is logged in and whether the item is in Favorites
        $isFavorited = false;
        $filteredItems = [];

        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $favorisModel = new FavorisModel();
            $favoris = $favorisModel->getFavoris($userId);

            foreach ($favoris as $favori) {
                if ($favori['element_id'] == $id && $favori['element_type'] == $type) {
                    $isFavorited = true;
                    break;
                }
            }
        }

        // Filtering similar items
        if ($details) {
            $director = isset($details['credits']['crew'])
                ? array_column(array_filter($details['credits']['crew'], fn($crew) => $crew['job'] === 'Director'), 'name')[0] ?? null : null;

            $genres = array_column($details['genres'], 'id');
            $mainCast = array_column(array_slice($details['credits']['cast'], 0, 3), 'name');
            $titleKeywords = explode(' ', preg_replace('/[^a-zA-Z0-9 ]/', '', strtolower($details['title'] ?? $details['name'])));

            $filteredItems = array_filter($similarItems, function ($item) use ($titleKeywords, $director, $genres, $mainCast) {
                $itemTitle = strtolower($item['title'] ?? $item['name'] ?? '');
                $itemGenres = $item['genre_ids'] ?? [];
                $itemCast = $item['credits']['cast'] ?? [];
                $itemCrew = $item['credits']['crew'] ?? [];

                // Check that title keywords match
                $itemTitleKeywords = explode(' ', preg_replace('/[^a-zA-A0-9 ]/', '', $itemTitle));
                if (array_intersect($titleKeywords, $itemTitleKeywords)) {
                    return true;
                }

                // Check if the director is the same
                if ($director && array_intersect([$director], array_column(array_filter($itemCrew, fn($crew) => $crew['job'] === 'Director'), 'name'))) {
                    return true;
                }

                // Check if the main actors are similar
                if (array_intersect($mainCast, array_column($itemCast, 'name'))) {
                    return true;
                }

                // Check if the gender is the same
                if (array_intersect($genres, $itemGenres)) {
                    return true;
                }

                return false;
            });
        }

        // Passing data to the view
        require_once __DIR__ . '/../views/detail.php';
    }
}
