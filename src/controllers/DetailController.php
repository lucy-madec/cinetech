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
        $similarItems = $this->apiModel->getSimilar($type, $id);

        // Filter criteria
        $director = isset($details['credits']['crew']) ? array_column(array_filter($details['credits']['crew'], fn($crew) => $crew['job'] === 'Director'), 'name')[0] ?? null : null;
        $genres = array_column($details['genres'], 'id');
        $mainCast = array_column(array_slice($details['credits']['cast'], 0, 3), 'name'); // Takes the 3 main players
        $title = $details['title'] ?? $details['name'];

        // Filtering similar items
        $filteredItems = array_filter($similarItems, function ($item) use ($title, $director, $genres, $mainCast) {
            // Checking similar title
            if (stripos($item['title'] ?? $item['name'], $title) !== false) {
                return true;
            }

            // Check if the director is the same
            if (isset($item['credits']['crew'])) {
                $itemDirectors = array_column(array_filter($item['credits']['crew'], fn($crew) => $crew['job'] === 'Director'), 'name');
                if ($director && in_array($director, $itemDirectors)) {
                    return true;
                }
            }

            // Check if at least one main actor is the same
            if (isset($item['credits']['cast'])) {
                $itemCast = array_column(array_slice($item['credits']['cast'], 0, 3), 'name');
                if (array_intersect($mainCast, $itemCast)) {
                    return true;
                }
            }

            // Check if the gender is the same
            if (isset($item['genre_ids']) && array_intersect($genres, $item['genre_ids'])) {
                return true;
            }

            return false;
        });

        // Passing data to the view
        require_once __DIR__ . '/../views/detail.php';
    }
}