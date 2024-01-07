<?php

namespace App\Modules\BoardingPass\Types;

use App\Modules\BoardingPass\Exceptions\InvalidTypeException;

class TypeFactory
{
    /**
     * @throws InvalidTypeException
     */
    public static function fromString(string $type): IBoardingPassType
    {
        return match ($type) {
            TypeConstants::TYPE_PLANE_ID => new Plane(),
            TypeConstants::TYPE_TRAIN_ID => new Train(),
            TypeConstants::TYPE_BUS_ID => new Bus(),
            default => throw new InvalidTypeException("Type $type is invalid and not supported."),
        };
    }
}