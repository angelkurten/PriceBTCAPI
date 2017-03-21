<?php

namespace App\Oriana;

use App\Oriana\Contracts\Bitstamp;
use App\Oriana\Contracts\Cryptropay;
use App\Oriana\Contracts\Localcoins;
use App\Oriana\Contracts\Surbtc;

class Oriana
{

    protected $contracts = [Bitstamp::class, Localcoins::class, Cryptropay::class, /*Surbtc::class*/];
    protected $objs = [];
    protected $seconds = 5;

    public function __construct(){
        foreach ($this->contracts as $contract){
            $this->objs[] = new $contract;
        }
    }

    public function getValues(){

        foreach ($this->objs as $obj)
        {
            $data[$obj->name] = $obj->getValue();
        }
        return $data;
    }

    function make($success = true, $message = null)
    {
        return response()->json([
            'success' => $success,
            'data' => $this->getValues(),
            'message' => $message
        ])->header('Refresh', $this->seconds);
    }

    public function setSeconds($s)
    {
        $this->seconds = $s;
    }
}