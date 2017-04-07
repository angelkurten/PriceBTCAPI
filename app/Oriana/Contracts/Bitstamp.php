<?php

namespace App\Oriana\Contracts;


class Bitstamp extends BaseContract
{
    protected $base_url = 'https://www.bitstamp.net/api/v2/';
    public $name = 'bitstamp';


    public function getValue()
    {
        return $this->converterCop($this->request('ticker/btcusd', 'last'));
    }

}