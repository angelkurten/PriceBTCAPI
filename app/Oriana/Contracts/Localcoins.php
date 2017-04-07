<?php

namespace App\Oriana\Contracts;



class Localcoins extends BaseContract
{
    protected $base_url = 'https://localbitcoins.com/';
    public $name = 'localcoins';

    public function getValue()
    {

        try{

            $value = $this->request('bitcoinaverage/ticker-all-currencies/', 'COP')->rates->last;
            session(['localcoin' => $value]);
        } catch (\Exception $e) {
            $value = session('localcoin');
            \Log::info('Error capturado');
        }

        return $value;
    }

}