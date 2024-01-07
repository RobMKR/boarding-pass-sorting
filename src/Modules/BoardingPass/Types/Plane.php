<?php

namespace App\Modules\BoardingPass\Types;

class Plane implements IBoardingPassType
{
    public function getId(): string
    {
        return TypeConstants::TYPE_PLANE_ID;
    }

    public function getName(): string
    {
        return TypeConstants::TYPE_PLANE_NAME;
    }
}