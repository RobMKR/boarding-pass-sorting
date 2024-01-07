<?php

namespace App\Modules\BoardingPass\Types;

class Bus implements IBoardingPassType
{
    public function getName(): string
    {
        return 'Bus';
    }
}