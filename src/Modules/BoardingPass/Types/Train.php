<?php

namespace App\Modules\BoardingPass\Types;

class Train implements IBoardingPassType
{
    public function getId(): string
    {
        return TypeConstants::TYPE_TRAIN_ID;
    }

    public function getName(): string
    {
        return TypeConstants::TYPE_TRAIN_NAME;
    }
}