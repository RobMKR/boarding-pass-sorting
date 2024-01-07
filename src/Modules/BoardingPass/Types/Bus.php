<?php

namespace App\Modules\BoardingPass\Types;

class Bus implements IBoardingPassType
{
    public function getId(): string
    {
        return TypeConstants::TYPE_BUS_ID;
    }

    public function getName(): string
    {
        return TypeConstants::TYPE_BUS_NAME;
    }
}