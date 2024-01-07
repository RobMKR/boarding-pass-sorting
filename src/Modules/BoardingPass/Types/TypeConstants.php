<?php

namespace App\Modules\BoardingPass\Types;

class TypeConstants
{
    const TYPE_PLANE_ID = 'plane';
    const TYPE_BUS_ID = 'bus';
    const TYPE_TRAIN_ID = 'train';

    const TYPE_PLANE_NAME = 'Plane';
    const TYPE_BUS_NAME = 'Bus';
    const TYPE_TRAIN_NAME = 'Train';

    const TYPES_MAP = [
        self::TYPE_PLANE_ID => self::TYPE_BUS_NAME,
        self::TYPE_BUS_ID => self::TYPE_BUS_NAME,
        self::TYPE_TRAIN_ID => self::TYPE_TRAIN_NAME,
    ];
}