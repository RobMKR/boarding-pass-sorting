<?php

namespace App\Modules\BoardingPass\Types;

class Plane implements IBoardingPassType
{
    public function getName(): string
    {
        return 'Plane';
    }
}