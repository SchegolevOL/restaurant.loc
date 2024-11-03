<?php

namespace App\Services\SendAd;

use App\Contracts\SendAd\SendMassages;

class AdTelegram
{
    protected $services;

    public function __construct(SendMassages $services)
    {
        $this->services=$services;
    }
    public function sendTelegram(){
        return $this->services->send();
    }
}
