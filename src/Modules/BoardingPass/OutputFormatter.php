<?php

namespace App\Modules\BoardingPass;

class OutputFormatter
{
    /**
     * @param BoardingPass[] $boardingPasses
     */
    public function __construct(protected array $boardingPasses)
    {
    }

    public function format(): array
    {
        $outputs = [];

        foreach ($this->boardingPasses as $i => $pass) {
            $outputs["Step " . $i + 1] = $pass->toString();
        }

        $outputs["Step " . count($outputs) + 1] = "You have reached your destination";

        return $outputs;
    }
}