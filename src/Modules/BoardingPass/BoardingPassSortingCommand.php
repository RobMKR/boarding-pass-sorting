<?php

namespace App\Modules\BoardingPass;

use App\Modules\BoardingPass\Exceptions\NoStartingSourceFoundException;

class BoardingPassSortingCommand
{
    /** @var BoardingPass[] */
    protected array $sortedSet = [];

    /** @var BoardingPass[] where key = source  */
    protected array $unsortedSet = [];
    protected array $destinationToSourceMap = [];

    /**
     * @param BoardingPass[] $boardingPassCollection
     */
    public function __construct(array $boardingPassCollection)
    {
        $this->unsortedSet = $boardingPassCollection;

        foreach ($boardingPassCollection as $pass) {
            $this->unsortedSet[$pass->getSource()] = $pass;
            $this->destinationToSourceMap[$pass->getDestination()] = $pass->getSource();
        }
    }

    /**
     * @return $this
     * @throws NoStartingSourceFoundException
     */
    public function sort(): static {
        // Step 1 Identify the start point
        // That will help us to run through boarding passing in sequence
        $startLocation = $this->findStartLocation();

        // While there is a boarding pass with starting location
        // We just add them to sortedSet
        // Then change startLocation to destination.
        // Once we reach the end of our trip (e.g. New York), there will not be a source with last destination
        // So loop will end!
        while (isset($this->unsortedSet[$startLocation])) {
            $pass = $this->unsortedSet[$startLocation];
            $startLocation = $pass->getDestination();
            $this->sortedSet[] = $pass;
        }

        return $this;
    }

    /**
     * @return BoardingPass[]
     */
    public function getSorted(): array
    {
        return $this->sortedSet;
    }

    /**
     * @throws NoStartingSourceFoundException
     */
    private function findStartLocation(): string
    {
        // Find the starting point (departure location that doesn't appear as an arrival)
        $startLocation = null;
        foreach ($this->unsortedSet as $pass) {
            if (!isset($this->destinationToSourceMap[$pass->getSource()])) {
                $startLocation = $pass->getSource();
                break;
            }
        }

        if ($startLocation === null) {
            throw new NoStartingSourceFoundException();
        }

        return $startLocation;
    }

}