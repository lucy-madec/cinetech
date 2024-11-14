<?php

namespace Models;

class ApiModel
{
    private $apiKey;
    private $apiBaseUrl;

    public function __construct()
    {
        $this->apiKey = 'd47a71e6bd7db6070f8a4a2b9b17aaa5';
        $this->apiBaseUrl = 'https://api.themoviedb.org/3';
    }

    // Function for making a GET request to the TMDb API
    private function fetchData($endpoint, $params = [])
    {
        $url = $this->apiBaseUrl . $endpoint . '?api_key=' . $this->apiKey;

        // Add additional parameters to the URL
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $url .= '&' . $key . '=' . urlencode($value);
            }
        }

        // Initialising CURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    // Recovering popular films
    public function getPopularMovies()
    {
        return $this->fetchData('/movie/popular');
    }

    // Recovering popular series
    public function getPopularSeries()
    {
        return $this->fetchData('/tv/popular');
    }

    // Recover details of a film or series
    public function getDetails($type, $id)
    {
        $endpoint = "https://api.themoviedb.org/3/{$type}/{$id}";
        $query = http_build_query([
            'api_key' => 'd47a71e6bd7db6070f8a4a2b9b17aaa5',
            'language' => 'fr-FR',
            'append_to_response' => 'credits'
        ]);

        $response = file_get_contents("{$endpoint}?{$query}");
        return json_decode($response, true);
    }

    // Recovery of similar items (films or series)
    public function getSimilar($type, $id)
    {
        $endpoint = "https://api.themoviedb.org/3/{$type}/{$id}/similar";
        $query = http_build_query([
            'api_key' => 'd47a71e6bd7db6070f8a4a2b9b17aaa5',
            'language' => 'fr-FR'
        ]);

        $response = file_get_contents("{$endpoint}?{$query}");
        $similarItems = json_decode($response, true);

        return $similarItems['results'] ?? [];
    }
}