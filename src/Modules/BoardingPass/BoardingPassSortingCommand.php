<?php

namespace App\Modules\BoardingPass;

class BoardingPassSortingCommand
{
    /** @var BoardingPass[] */
    protected array $sortedSet = [];

    /**
     * @param BoardingPass[] $boardingPassCollection
     */
    public function __construct(protected array $boardingPassCollection)
    {}

    /**
     * @return $this
     */
    public function sort(): static {
        return $this;
    }

    /**
     * @return BoardingPass[]
     */
    public function getSorted(): array
    {
        return $this->sortedSet;
    }
}