<?php

namespace App\Oriana\Contracts;


class Localcoins extends BaseContract
{
    protected $base_url = 'https://localbitcoins.com/';
    public $name = 'localcoins';

    public function getValue()
    {
        return $this->request('bitcoinaverage/ticker-all-currencies/', 'COP')->rates->last;
    }

}