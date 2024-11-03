<?php

namespace App\Services\SendAd;

use App\Contracts\SendAd\SendMassages;

class AdMail implements SendMassages
{
    protected $random;

    public function __construct()
    {
        $this->random = 'mail - '.rand(0, 100);
    }
    public function send(){
        return $this->random;
    }
}

