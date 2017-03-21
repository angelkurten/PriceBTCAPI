<?php

namespace App\Oriana\Contracts;


class Bitstamp extends BaseContract
{
    protected $base_url = 	'https://www.bitstamp.net/api/v2/';
    public $name = 'bitstamp';


    public function getValue()
    {
        return $this->converterCop($this->request('ticker/btcusd', 'last'));
    }

    protected function converterCop($value)
    {
        $get = file_get_contents("https://www.google.com/finance/converter?a=$value&from=usd&to=cop");
        $get = explode("<span class=bld>",$get);
        $get = explode("</span>",$get[1]);
        return preg_replace("/[^0-9\.]/", null, $get[0]);
    }

}