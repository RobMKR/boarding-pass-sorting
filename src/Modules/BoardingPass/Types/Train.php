<?php

namespace App\Modules\BoardingPass\Types;

class Train implements IBoardingPassType
{
    public function getName(): string
    {
        return 'Train';
    }
}