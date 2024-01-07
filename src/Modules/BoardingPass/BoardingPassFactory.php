<?php

namespace App\Modules\BoardingPass;

use App\Modules\BoardingPass\Exceptions\InvalidTypeException;
use App\Modules\BoardingPass\Types\TypeFactory;

class BoardingPassFactory
{
    /**
     * @throws InvalidTypeException
     */
    public static function fromArray(array $data): BoardingPass {
        return new BoardingPass(
            $data['id'],
            TypeFactory::fromString($data['type']),
            $data['source'],
            $data['destination'],
            $data['gate'],
            $data['seat']
        );
    }
}