<?php

namespace App\Oriana\Contracts;

use GuzzleHttp\Client;


class BaseContract
{
    protected $base_url;
    protected $name;

    protected function request($url, $key, $type = 'get', $options = [])
    {
        $client = new Client(['base_uri' => $this->base_url, $options]);
        $response = json_decode($client->request($type, $url)->getBody()->getContents());
        return $response->$key;
    }

    protected function requestWithoutKey($url, $type = 'get', $options = [])
    {
        $client = new Client(['base_uri' => $this->base_url, $options]);
        $response = json_decode($client->request($type, $url)->getBody()->getContents());
        return $response;
    }

}