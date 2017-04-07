<?php

namespace App\Oriana\Contracts;


class Bitfinex extends BaseContract
{
    public $name = 'bitfinex';
    protected $base_url = 'https://api.bitfinex.com/v2/';


    public function getValue()
    {
        return $this->converterCop($this->requestWithoutKey('tickers?symbols=tBTCUSD')[0][9]);
    }

}