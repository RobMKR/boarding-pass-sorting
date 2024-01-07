<?php

namespace App\Modules\BoardingPass\Types;

interface IBoardingPassType
{
    public function getId();
    public function getName(): string;
}