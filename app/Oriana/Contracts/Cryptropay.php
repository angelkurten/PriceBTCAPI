<?php

namespace App\Oriana\Contracts;


class Cryptropay extends BaseContract
{
    public $name = 'cryptropay';
    protected $base_url = 'https://cryptropay.com/';

    public function getValue()
    {
        return $this->request('/ajax/cotizacion/get-cotizacion-cop-for-layout', 'venta', 'post', [
            'headers' =>[
                'X-CSRF-TOKEN' => csrf_token()
            ]
        ]);
    }

}