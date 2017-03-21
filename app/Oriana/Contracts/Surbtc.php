<?php

namespace App\Oriana\Contracts;


class Surbtc extends BaseContract
{
    public $name = 'surbtc';
    protected $base_url = 'https://www.surbtc.com/api/v1/';

    public function getValue()
    {
        $responde = $this->requestWithoutKey('api_keys', 'POST');
        dd($responde);
    }


}