<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class PandaScoreApiService
{
    private $_client;

    public function __construct()
    {
        $config = config('panda_score');
        $this->_client = new Client([
            'base_uri' => $config['base_url'],
            'headers' => ['Authorization' => 'Bearer ' . $config['token']],
        ]);
    }

    public function getUpcomingMachs()
    {
        return $this->sendRequest('/csgo/matches/upcoming', 'GET');
    }

    private function sendRequest($url, $method, $options = []):array
    {
        try {
            $response = $this->_client->request($method, $url, $options);
        } catch (ClientException $e) {
            return [];
        }

        return json_decode($response->getBody()->getContents(), true);
    }
}
