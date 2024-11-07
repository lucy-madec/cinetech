<?php

require_once __DIR__ . '/src/models/ApiModel.php';

use Models\ApiModel;

// Instance creation
$api = new ApiModel();

// Retrieving popular films for testing
$popularMovies = $api->getPopularMovies();
echo '<h1>Films populaires</h1>';
foreach ($popularMovies['results'] as $movie) {
    echo '<p>' . $movie['title'] . '</p>';
}

// Récupération des séries populaires pour tester
$popularSeries = $api->getPopularSeries();
echo '<h1>Séries populaires</h1>';
foreach ($popularSeries['results'] as $series) {
    echo '<p>' . $series['name'] . '</p>';
}