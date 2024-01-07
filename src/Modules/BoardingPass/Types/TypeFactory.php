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
            'plane' => new Plane(),
            'train' => new Train(),
            'bus' => new Bus(),
            default => throw new InvalidTypeException("Type $type is invalid and not supported."),
        };
    }
}