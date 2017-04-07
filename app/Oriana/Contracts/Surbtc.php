<?php

namespace App\Oriana\Contracts;


class Surbtc extends BaseContract
{
    public $name = 'surbtc';
    protected $base_url = 'https://www.surbtc.com/api/v1/';

    public function getValue()
    {
        $date = new \DateTime();
        $nonce = $date->getTimestamp();
        $route = "markets/btc-cop/quotations";
        $payload = [
            "quotation" => [
                "type" => "bid",
                "reverse" => "false",
                "amount" => "1",
            ]
        ];

        $b64 = base64_encode(json_encode($payload));

        $string = "POST $route $b64 $nonce";

        $response = $this->requestWithoutKey($route, 'post', [
            'headers' => [
                'X-SBTC-APIKEY' => env('SURBTC_KEY'),
                'X-SBTC-NONCE' => $nonce,
                'X-SBTC-SIGNATURE' => hash_hmac('sha384', $string, env('SURBTC_SECRET')),
                'Content-Type'  => 'application/json'
            ],
            'body' => json_encode($payload),
        ]);

        return $response;
    }


}